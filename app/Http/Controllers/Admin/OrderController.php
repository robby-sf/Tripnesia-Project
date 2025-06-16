<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Midtrans\Config;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function index()
    {
        $transactions = Transaction::with(['user', 'package'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('pesanan', [
            'title' => 'Daftar Pesanan',
            'transactions' => $transactions
        ]);
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['user', 'package']);

        $validStatuses = [
            'awaiting_confirmation' => 'Awaiting Confirmation',
            'confirmed' => 'Confirmed (Tiket Tersedia)',
            'success' => 'Success (Legacy Status)',
            'refunded' => 'Refunded (Tiket Tidak Tersedia)',
            'completed' => 'Completed (Wisata Selesai)',
            'failed' => 'Failed',
            'cancelled' => 'Cancelled',
        ];

        return view('showdetail', [
            'title' => 'Detail Pesanan: ' . $transaction->order_id,
            'transaction' => $transaction,
            'validStatuses' => $validStatuses
        ]);
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $allowedStatuses = ['awaiting_confirmation', 'confirmed', 'success', 'cancelled', 'completed', 'failed'];

        $validator = Validator::make($request->all(), [
            'payment_status' => ['required', Rule::in($allowedStatuses)],
            'reason' => Rule::requiredIf($request->input('payment_status') === 'cancelled'),
        ], [
            'reason.required' => 'Alasan pembatalan wajib diisi jika status diubah menjadi Cancelled.'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.pesanan.show', $transaction->id)
                ->withErrors($validator)
                ->withInput();
        }

        $newStatus = $request->input('payment_status');
        $oldStatus = $transaction->payment_status;
        $adminId = Auth::id() ?? 'System';

        $transaction->payment_status = $newStatus;

        if ($newStatus === 'cancelled') {
            $cancellationReason = $request->input('reason');
            $transaction->admin_notes = ($transaction->admin_notes ? $transaction->admin_notes . "\n" : "")
                . "Pesanan dibatalkan oleh Admin (ID: {$adminId}) pada " . now()->toDateTimeString() . " dengan alasan: " . $cancellationReason;
        } else {
            $transaction->admin_notes = ($transaction->admin_notes ? $transaction->admin_notes . "\n" : "")
                . "Status diubah dari '{$oldStatus}' menjadi '{$newStatus}' oleh Admin (ID: {$adminId}) pada " . now()->toDateTimeString();
        }

        $transaction->save();

        Log::info("Admin (ID: {$adminId}) manually updated order (ID: {$transaction->order_id}) status from '{$oldStatus}' to '{$newStatus}'.");

        return redirect()->route('admin.pesanan.show', $transaction->id)
            ->with('success', 'Status pesanan berhasil diperbarui menjadi ' . ucfirst($newStatus));
    }


    public function destroy(Transaction $transaction)
    {
        $orderId = $transaction->order_id;
        $transaction->delete();
        $adminId = Auth::id() ?? 'System';
        Log::info("Admin (ID: {$adminId}) deleted order (ID: {$orderId}).");

        return redirect()->route('admin.pesanan.index')
            ->with('success', "Pesanan dengan ID {$orderId} berhasil dihapus.");
    }
}
