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
        $user = Auth::guard('web')->user();
        return view('checkout', compact('package', 'user'));
    }

    public function process(Request $request, $id)
    {
        $user = Auth::guard('web')->user();
        $package = Package::findOrFail($id);

        $orderId = 'TRX-' . time() . '-' . Str::upper(Str::random(5)) . '-' . $package->id;

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'order_id' => $orderId,
            'total_amount' => $package->price,
            'payment_status' => 'pending',
        ]);

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
                    'name' => $package->name,
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

        $newStatus = $transaction->payment_status;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $newStatus = 'challenge';
            } else if ($fraudStatus == 'accept') {
                $newStatus = 'success';
            }
        } else if ($transactionStatus == 'settlement') {
            $newStatus = 'success';
        } else if ($transactionStatus == 'pending') {
            $newStatus = 'pending';
        } else if ($transactionStatus == 'deny') {
            $newStatus = 'failed';
        } else if ($transactionStatus == 'expire') {
            $newStatus = 'expire';
        } else if ($transactionStatus == 'cancel') {
            $newStatus = 'cancelled';
        }

        if ($transaction->payment_status != $newStatus) {
            $transaction->payment_status = $newStatus;
        }

        $transaction->payment_details = json_encode($notif->getResponse());
        $transaction->save();

        if ($newStatus == 'success') {
        }

        return response()->json(['message' => 'Notification processed successfully.']);
    }

    public function finish(Request $request)
    {
        $orderId = $request->query('order_id');

        if (!$orderId) {
            return redirect()->route('home')->with('error', 'Akses tidak valid atau transaksi tidak ditemukan.');
        }

        $transaction = \App\Models\Transaction::with('package')->where('order_id', $orderId)->first();

        if (!$transaction) {
            return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan.');
        }

        if ($transaction->payment_status == 'success' || $transaction->payment_status == 'settlement') {
            return view('success', compact('transaction'));
        } elseif ($transaction->payment_status == 'pending' || $transaction->payment_status == 'challenge') {
            return view('pending', compact('transaction'));
        } else {
            return view('failed', compact('transaction'));
        }
    }
}
