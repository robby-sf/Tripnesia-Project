<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Import Auth untuk tipe data yang lebih jelas
use Illuminate\Validation\Rule;
use Midtrans\Transaction as MidtransTransaction;

class OrderController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // Pastikan Anda menerapkan middleware yang sesuai di sini atau di file rute
        // $this->middleware(['auth', 'is_admin']);
    }

    /**
     * Menampilkan daftar semua pesanan.
     */
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

    /**
     * Menampilkan detail satu pesanan.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load(['user', 'package']);
        $validStatuses = [
            'pending' => 'Pending',
            'success' => 'Success',
            'settlement' => 'Settlement',
            'confirmed' => 'Confirmed',
            'completed' => 'Completed',
            'failed' => 'Failed',
            'cancelled' => 'Cancelled',
            'expire' => 'Expire',
            'refunded' => 'Refunded',
        ];

        return view('show', [
            'title' => 'Detail Pesanan: ' . $transaction->order_id,
            'transaction' => $transaction,
            'validStatuses' => $validStatuses
        ]);
    }

    /**
     * Mengkonfirmasi ketersediaan pesanan.
     */
    public function confirmOrder(Transaction $transaction)
    {
        if (!in_array($transaction->payment_status, ['success', 'settlement'])) {
            return redirect()->route('admin.pesanan.show', $transaction->id)
                ->with('error', 'Hanya pesanan yang sudah berhasil dibayar yang dapat dikonfirmasi.');
        }

        $transaction->payment_status = 'confirmed';
        // PERBAIKAN: Menggunakan Auth::id() atau optional() untuk keamanan tipe data
        $adminId = Auth::id() ?? 'System';
        $transaction->admin_notes = ($transaction->admin_notes ? $transaction->admin_notes . "\n" : "")
            . "Pesanan dikonfirmasi oleh Admin (ID: {$adminId}) pada " . now()->toDateTimeString();
        $transaction->save();

        return redirect()->route('admin.pesanan.show', $transaction->id)
            ->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    /**
     * Memproses permintaan refund melalui API Midtrans.
     */
    public function processRefund(Request $request, Transaction $transaction)
    {
        $request->validate(['reason' => 'required|string|max:255']);

        if (!in_array($transaction->payment_status, ['success', 'settlement'])) {
            return redirect()->route('admin.pesanan.show', $transaction->id)
                ->with('error', 'Hanya pesanan yang sudah berhasil dibayar yang dapat di-refund.');
        }

        $orderId = $transaction->order_id;
        $params = ['reason' => $request->input('reason')];

        try {
            // PERBAIKAN: Menambahkan komentar @var untuk membantu linter
            /** @var object $response */
            $response = MidtransTransaction::refund($orderId, $params);

            // PERBAIKAN: Menggunakan property_exists untuk pengecekan yang lebih aman sebelum mengakses properti
            if (property_exists($response, 'status_code') && $response->status_code == '200' && property_exists($response, 'transaction_status') && in_array($response->transaction_status, ['refund', 'partial_refund'])) {
                $transaction->payment_status = 'refunded';
                $adminId = Auth::id() ?? 'System';
                $transaction->admin_notes = ($transaction->admin_notes ? $transaction->admin_notes . "\n" : "")
                    . "Refund diproses oleh Admin (ID: {$adminId}) pada " . now()->toDateTimeString() . " dengan alasan: " . $request->input('reason');
                $transaction->save();

                return redirect()->route('admin.pesanan.show', $transaction->id)
                    ->with('success', 'Refund berhasil diproses melalui Midtrans.');
            } else {
                $errorMessage = property_exists($response, 'status_message') ? $response->status_message : 'Status tidak diketahui.';
                return redirect()->route('admin.pesanan.show', $transaction->id)
                    ->with('error', 'Midtrans gagal memproses refund. Pesan: ' . $errorMessage);
            }
        } catch (\Exception $e) {
            Log::error("Midtrans Refund API failed for order (ID: {$orderId}): " . $e->getMessage());
            return redirect()->route('admin.pesanan.show', $transaction->id)
                ->with('error', 'Terjadi kesalahan saat menghubungi API Midtrans: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus pesanan (Soft Delete).
     */
    public function destroy(Transaction $transaction)
    {
        $orderId = $transaction->order_id;
        $transaction->delete();
        $adminId = Auth::id() ?? 'System';
        Log::info("Admin (ID: {$adminId}) deleted order (ID: {$orderId}).");

        return redirect()->route('admin.pesanan.index')
            ->with('success', "Pesanan dengan ID {$orderId} berhasil dihapus (soft delete).");
    }

    /**
     * Mengupdate status pembayaran pesanan secara manual.
     */
    public function updateStatus(Request $request, Transaction $transaction)
    {
        $allowedStatuses = [
            'pending',
            'success',
            'settlement',
            'confirmed',
            'completed',
            'failed',
            'cancelled',
            'expire',
            'refunded'
        ];
        $request->validate([
            'payment_status' => ['required', Rule::in($allowedStatuses)],
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $oldStatus = $transaction->payment_status;
        $transaction->payment_status = $request->input('payment_status');

        if ($request->filled('admin_notes')) {
            $currentAdminNotes = $transaction->admin_notes ? $transaction->admin_notes . "\n" : "";
            $adminId = Auth::id() ?? 'System';
            $transaction->admin_notes = $currentAdminNotes . "Update status manual oleh Admin (ID: {$adminId}) pada " . now()->toDateTimeString() . ": " . $request->input('admin_notes');
        }
        $transaction->save();

        $adminIdForLog = Auth::id() ?? 'System';
        Log::info("Admin (ID: {$adminIdForLog}) manually updated order (ID: {$transaction->order_id}) status from '{$oldStatus}' to '{$transaction->payment_status}'.");

        return redirect()->route('admin.pesanan.show', $transaction->id)
            ->with('success', 'Status pesanan berhasil diperbarui secara manual.');
    }
}
