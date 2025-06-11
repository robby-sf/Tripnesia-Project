<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function __construct()
    {
        // Contoh proteksi dengan middleware, pastikan Anda punya middleware 'is_admin'
        // atau sesuaikan dengan sistem autentikasi dan otorisasi Anda.
        // $this->middleware('auth');
        // $this->middleware('is_admin'); // Anda perlu membuat middleware ini jika belum ada
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
            'pending' => 'Pending',
            'success' => 'Success',
            'settlement' => 'Settlement',
            'capture' => 'Capture',
            'challenge' => 'Challenge',
            'failed' => 'Failed',
            'deny' => 'Deny',
            'cancel' => 'Cancel (Midtrans)',
            'cancelled' => 'Cancelled (Manual)',
            'expire' => 'Expire',
            'refund' => 'Refund'
        ];
        return view('show', [
            'title' => 'Detail Pesanan: ' . $transaction->order_id,
            'transaction' => $transaction,
            'validStatuses' => $validStatuses
        ]);
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $allowedStatuses = [
            'pending',
            'success',
            'settlement',
            'capture',
            'challenge',
            'failed',
            'deny',
            'cancel',
            'cancelled',
            'expire',
            'refund'
        ];
        $request->validate([
            'payment_status' => ['required', Rule::in($allowedStatuses)],
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $oldStatus = $transaction->payment_status;
        $transaction->payment_status = $request->input('payment_status');
        if ($request->filled('admin_notes')) {
            $currentAdminNotes = $transaction->admin_notes ? $transaction->admin_notes . "\n" : "";
            $transaction->admin_notes = $currentAdminNotes . "Update by Admin (" . now()->toDateTimeString() . "): " . $request->input('admin_notes');
        }
        $transaction->save();

        Log::info("Admin (ID: " . (auth()->id() ?? 'System') . ") updated order (ID: {$transaction->order_id}) status from '{$oldStatus}' to '{$transaction->payment_status}'.");

        return redirect()->route('admin.pesanan.show', $transaction->id)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $orderId = $transaction->order_id;
        $transaction->delete(); // Melakukan soft delete

        Log::info("Admin (ID: " . (auth()->id() ?? 'System') . ") deleted order (ID: {$orderId}).");

        return redirect()->route('admin.pesanan.index')
            ->with('success', "Pesanan dengan ID {$orderId} berhasil dihapus (soft delete).");
    }
}
