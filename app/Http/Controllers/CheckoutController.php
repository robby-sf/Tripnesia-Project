<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification as MidtransNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('notificationHandler');
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function show($id)
    {
        $package = Package::findOrFail($id);
        $user = Auth::user();
        return view('checkout', compact('package', 'user'));
    }

    public function process(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ticket_date' => 'required|date|after_or_equal:today',
        ], [
            'ticket_date.required' => 'Tanggal wisata wajib diisi.',
            'ticket_date.date' => 'Format tanggal tidak valid.',
            'ticket_date.after_or_equal' => 'Tanggal wisata tidak boleh untuk hari yang sudah lewat.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $user = Auth::user();
        $package = Package::findOrFail($id);

        $orderId = 'TRX-' . time() . '-' . Str::upper(Str::random(5)) . '-' . $package->id;

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'ticket_date' => $request->input('ticket_date'),
            'order_id' => $orderId,
            'total_amount' => $package->price,
            'payment_status' => 'pending',
        ]);

        $formattedDate = Carbon::parse($request->input('ticket_date'))->format('d M Y');

        $params = [
            'transaction_details' => [
                'order_id' => $transaction->order_id,
                'gross_amount' => $transaction->total_amount,
            ],
            'customer_details' => [
                'first_name' => $user->nama,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => $package->id,
                    'price' => $package->price,
                    'quantity' => 1,
                    'name' => $package->name . ' (Wisata tgl: ' . $formattedDate . ')',
                ],
            ],
            'expiry' => [
                'duration' => 1,
                'unit' => 'hour',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            $transaction->snap_token = $snapToken;
            $transaction->save();

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['error' => 'Gagal memproses pembayaran: ' . $e->getMessage()], 500);
        }
    }

    public function notificationHandler(Request $request)
    {
        $notif = new MidtransNotification();
        $transactionStatus = $notif->transaction_status;
        $fraudStatus = $notif->fraud_status;
        $orderId = $notif->order_id;
        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found.'], 404);
        }

        $signatureKey = hash("sha512", $orderId . $notif->status_code . $notif->gross_amount . config('midtrans.server_key'));
        if ($notif->signature_key != $signatureKey) {
            return response()->json(['message' => 'Invalid signature.'], 403);
        }

        if (in_array($transaction->payment_status, ['confirmed', 'refunded', 'completed'])) {
            return response()->json(['message' => 'Transaction status already finalized by admin.']);
        }

        $newStatus = $transaction->payment_status;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'accept') {
                $newStatus = 'awaiting_confirmation';
            }
        } else if ($transactionStatus == 'settlement') {
            $newStatus = 'awaiting_confirmation';
        } else if ($transactionStatus == 'pending') {
            $newStatus = 'pending';
        } else if ($transactionStatus == 'deny') {
            $newStatus = 'failed';
        } else if ($transactionStatus == 'expire') {
            $newStatus = 'expire';
        } else if ($transactionStatus == 'cancel') {
            $newStatus = 'cancelled';
        }

        $transaction->payment_status = $newStatus;
        $transaction->payment_details = json_encode($notif->getResponse());
        $transaction->save();

        return response()->json(['message' => 'Notification processed successfully.']);
    }

    public function finish(Request $request)
    {
        return redirect()->route('home');
    }

    public function updateStatusOnSuccess(Request $request, $order_id)
    {
        $transaction = Transaction::where('order_id', $order_id)->first();

        if ($transaction && $transaction->payment_status === 'pending') {
            $transaction->payment_status = 'awaiting_confirmation';
            $transaction->save();

            return response()->json(['status' => 'success', 'message' => 'Status updated to awaiting confirmation.']);
        }

        return response()->json(['status' => 'no_change', 'message' => 'Transaction not found or status already updated.'], 404);
    }
}
