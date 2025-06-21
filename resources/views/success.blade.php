<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="png" href="/Asset/icon Web.png">
    <title>Pembayaran Berhasil - {{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    <style>
        .status-badge {
            display: inline-block;
            padding: 0.3em 0.6em;
            font-size: 0.9em;
            font-weight: bold;
            border-radius: 0.25rem;
        }

        .status-success {
            background-color: #d1fae5;
            /* green-100 */
            color: #065f46;
            /* green-800 */
        }
    </style>
</head>

<body class="font-sans leading-normal tracking-normal">

    {{-- <x-Navbar class="navbar"></x-Navbar> --}}

    <div class="container mx-auto mt-10 md:mt-20 mb-10 px-4">
        <div class="max-w-2xl mx-auto bg-white p-8 md:p-12 rounded-xl shadow-xl">
            <div class="text-center">
                <svg class="w-16 h-16 md:w-24 md:h-24 text-green-500 mx-auto mb-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Pembayaran Berhasil!</h1>
                <p class="text-gray-600 text-lg mb-8">
                    Terima kasih! Pesanan Anda telah kami terima dan pembayaran telah berhasil dikonfirmasi.
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
                            class="float-right status-badge status-success">{{ ucfirst($transaction->payment_status) }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Tanggal Transaksi:</span>
                        <span
                            class="text-gray-800 float-right">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    @php
                        $paymentTypeDisplay = 'N/A';
                        if ($transaction->payment_details) {
                            $paymentDetails = json_decode($transaction->payment_details, true);
                            if (isset($paymentDetails['payment_type'])) {
                                $paymentTypeDisplay = str_replace('_', ' ', ucwords($paymentDetails['payment_type']));
                            }
                        }
                    @endphp
                    <div>
                        <span class="font-medium text-gray-600">Metode Pembayaran:</span>
                        <span class="text-gray-800 float-right">{{ $paymentTypeDisplay }}</span>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <p class="text-gray-600 mb-6">
                    Informasi lebih lanjut mengenai pesanan Anda akan dikirimkan melalui email (jika berlaku).
                    Jika ada pertanyaan, silakan hubungi layanan pelanggan kami.
                </p>
                <a href="{{ route('home') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                    Kembali ke Beranda
                </a>
                {{-- <a href="{{ route('history.order') }}" --}}
                {{-- class="inline-block ml-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-8 rounded-lg transition duration-300"> --}}
                {{-- Lihat Riwayat Pesanan --}}
                {{-- </a> --}}
            </div>
        </div>
    </div>
</body>

</html>
