<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pembayaran Menunggu - {{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    <style>
        .status-badge {
            display: inline-block;
            padding: 0.3em 0.6em;
            font-size: 0.9em;
            font-weight: bold;
            border-radius: 0.25rem;
        }

        .status-pending {
            background-color: #feF3C7;
            /* yellow-100 */
            color: #92400E;
            /* yellow-800 */
        }
    </style>
</head>

<body class="font-sans leading-normal tracking-normal">

    {{-- <x-Navbar class="navbar"></x-Navbar> --}}

    <div class="container mx-auto mt-10 md:mt-20 mb-10 px-4">
        <div class="max-w-2xl mx-auto bg-white p-8 md:p-12 rounded-xl shadow-xl">
            <div class="text-center">
                <svg class="w-16 h-16 md:w-24 md:h-24 text-yellow-500 mx-auto mb-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Pembayaran Menunggu Konfirmasi</h1>
                <p class="text-gray-600 text-lg mb-8">
                    Pesanan Anda telah kami terima dan kami sedang menunggu konfirmasi pembayaran Anda.
                    Silakan selesaikan pembayaran sesuai instruksi yang telah diberikan.
                </p>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Detail Transaksi</h2>
                <div class="space-y-3">
                    <div>
                        <span class="font-medium text-gray-600">Order ID:</span>
                        <span class="text-gray-800 float-right">{{ $transaction->order_id }}</span>
                    </div>
                    @if ($transaction->package)
                        <div>
                            <span class="font-medium text-gray-600">Paket Wisata:</span>
                            <span class="text-gray-800 float-right">{{ $transaction->package->name }}</span>
                        </div>
                    @endif
                    <div>
                        <span class="font-medium text-gray-600">Total Pembayaran:</span>
                        <span class="text-gray-800 float-right">Rp
                            {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Status Pembayaran:</span>
                        <span
                            class="float-right status-badge status-pending">{{ ucfirst($transaction->payment_status) }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Tanggal Transaksi:</span>
                        <span
                            class="text-gray-800 float-right">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    @php
                        $paymentTypeDisplay = 'N/A';
                        $paymentInstructions = null;
                        if ($transaction->payment_details) {
                            $paymentDetails = json_decode($transaction->payment_details, true);
                            if (isset($paymentDetails['payment_type'])) {
                                $paymentTypeDisplay = str_replace('_', ' ', ucwords($paymentDetails['payment_type']));
                            }
                            // Contoh instruksi untuk Virtual Account
                            if (isset($paymentDetails['va_numbers'][0]['va_number'])) {
                                $paymentInstructions =
                                    'Nomor Virtual Account: ' .
                                    $paymentDetails['va_numbers'][0]['bank'] .
                                    ' ' .
                                    $paymentDetails['va_numbers'][0]['va_number'];
                            } elseif (isset($paymentDetails['permata_va_number'])) {
                                $paymentInstructions =
                                    'Nomor Virtual Account Permata: ' . $paymentDetails['permata_va_number'];
                            }
                            // Tambahkan parsing untuk metode lain jika perlu (QRIS, e-wallet, dll.)
                        }
                    @endphp
                    <div>
                        <span class="font-medium text-gray-600">Metode Pembayaran:</span>
                        <span class="text-gray-800 float-right">{{ $paymentTypeDisplay }}</span>
                    </div>
                    @if ($paymentInstructions)
                        <div class="pt-2">
                            <span class="font-medium text-gray-600 block">Instruksi Pembayaran:</span>
                            <span class="text-gray-800 block text-sm">{{ $paymentInstructions }}</span>
                            <span class="text-gray-500 block text-xs">Harap selesaikan pembayaran sebelum batas waktu
                                agar pesanan tidak dibatalkan.</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="text-center">
                <p class="text-gray-600 mb-6">
                    Jika Anda sudah melakukan pembayaran, mohon tunggu beberapa saat hingga sistem kami
                    mengonfirmasinya.
                    Status akan diperbarui secara otomatis.
                </p>
                <a href="{{ route('home') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>

</html>
