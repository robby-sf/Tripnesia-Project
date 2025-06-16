<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Midtrans\Transaction as MidtransTransaction;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'is_admin']);
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

        // PERBAIKAN: Menyesuaikan daftar status yang bisa dipilih admin
        $validStatuses = [
            'awaiting_confirmation' => 'Awaiting Confirmation',
            'confirmed' => 'Confirmed (Tiket Tersedia)',
            'success' => 'Success (Legacy Status)', // Tetap ada jika dibutuhkan
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
        // PERBAIKAN: Menyesuaikan daftar status yang diizinkan
        $allowedStatuses = ['awaiting_confirmation', 'confirmed', 'success', 'refunded', 'completed', 'failed', 'cancelled'];

        $validator = Validator::make($request->all(), [
            'payment_status' => ['required', Rule::in($allowedStatuses)],
            'reason' => Rule::requiredIf($request->input('payment_status') === 'refunded'),
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.pesanan.show', $transaction->id)
                ->withErrors($validator)
                ->withInput();
        }

        $newStatus = $request->input('payment_status');
        $oldStatus = $transaction->payment_status;

        if ($newStatus === 'refunded') {
            if (!in_array($oldStatus, ['awaiting_confirmation', 'success', 'settlement', 'confirmed'])) {
                return redirect()->route('admin.pesanan.show', $transaction->id)
                    ->with('error', 'Hanya pesanan yang sudah berhasil dibayar/dikonfirmasi yang dapat di-refund.');
            }
            return $this->executeRefund($request, $transaction);
        }

        $transaction->payment_status = $newStatus;
        $adminId = Auth::id() ?? 'System';
        $transaction->admin_notes = ($transaction->admin_notes ? $transaction->admin_notes . "\n" : "")
            . "Status diubah menjadi '{$newStatus}' oleh Admin (ID: {$adminId}) pada " . now()->toDateTimeString();
        $transaction->save();

        Log::info("Admin (ID: {$adminId}) manually updated order (ID: {$transaction->order_id}) status from '{$oldStatus}' to '{$newStatus}'.");

        return redirect()->route('admin.pesanan.show', $transaction->id)
            ->with('success', 'Status pesanan berhasil diperbarui menjadi ' . ucfirst($newStatus));
    }

    private function executeRefund(Request $request, Transaction $transaction)
    {
        $orderId = $transaction->order_id;
        $params = ['reason' => $request->input('reason')];

        try {
            /** @var object $response */
            $response = MidtransTransaction::refund($orderId, $params);

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
