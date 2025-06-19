<!doctype html>
<html class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('Asset/icon Web.png') }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Detail Pesanan' }} - Tripnesia</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
            line-height: 1.25;
        }

        .status-awaiting {
            background-color: #fef9c3;
            color: #854d0e;
            border: 1px solid #fde047;
        }

        .status-success {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .status-completed {
            background-color: #dbeafe;
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        .status-pending {
            background-color: #e0e7ff;
            color: #4338ca;
            border: 1px solid #a5b4fc;
        }

        .status-failed {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .status-refunded {
            background-color: #e5e7eb;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .card {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            border: 1px solid #e5e7eb;
            padding: 1.5rem;
        }

        .dl-grid {
            display: grid;
            grid-template-columns: max-content 1fr;
            gap: 0.5rem 1rem;
            align-items: center;
        }

        .dl-grid dt {
            color: #6b7280;
        }

        .dl-grid dd {
            color: #111827;
            font-weight: 500;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-inter h-full">

    <div class="flex flex-nowrap w-full">
        <div class="sticky top-0">
            <div class="flex flex-col">
                <x-admin-header></x-admin-header>
                <x-admin-side-bar class="w-72 flex-1"></x-admin-side-bar>
            </div>
        </div>

        <main class="flex flex-col w-full">

            <x-admin-navbar class="bg-gray-50 w-full">
                {{ $title ?? 'Detail Pesanan' }}
            </x-admin-navbar>

            <div class="flex-1 p-6 md:p-8">
                <div class="flex justify-end mb-6">
                    <a href="{{ route('admin.pesanan.index') }}"
                        class="flex items-center text-sm bg-white hover:bg-gray-100 border border-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg shadow-sm transition">
                        &larr; Kembali ke Daftar Pesanan
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-md text-sm">
                        {{ session('success') }}</div>
                @endif
                @if (session('error') || $errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-800 border-l-4 border-red-500 rounded-md text-sm">
                        <strong class="font-bold">Terjadi Kesalahan!</strong>
                        @if (session('error'))
                            <p>{{ session('error') }}</p>
                        @else
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="space-y-8">
                        <div class="card">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Pesanan</h3>
                            <dl class="dl-grid text-sm">
                                <dt>ID Pesanan</dt>
                                <dd class="font-mono tracking-wider">{{ $transaction->order_id }}</dd>
                                <dt>Tanggal Pesan</dt>
                                <dd>{{ $transaction->created_at->format('d F Y, H:i') }}</dd>
                                <dt>Status</dt>
                                <dd>
                                    @php
                                        $statusClass = 'status-refunded';
                                        $statusText = ucfirst(str_replace('_', ' ', $transaction->payment_status));

                                        switch (strtolower($transaction->payment_status)) {
                                            case 'awaiting_confirmation':
                                            case 'settlement':
                                                $statusClass = 'status-awaiting';
                                                $statusText = 'Perlu Dikonfirmasi';
                                                break;
                                            case 'success':
                                            case 'confirmed':
                                                $statusClass = 'status-success';
                                                $statusText = 'Sukses (Tersedia)';
                                                break;
                                            case 'completed':
                                                $statusClass = 'status-completed';
                                                $statusText = 'Selesai';
                                                break;
                                            case 'pending':
                                            case 'challenge':
                                                $statusClass = 'status-pending';
                                                $statusText = 'Menunggu Pembayaran';
                                                break;
                                            case 'failed':
                                            case 'expire':
                                            case 'cancelled':
                                            case 'deny':
                                                $statusClass = 'status-failed';
                                                $statusText = 'Dibatalkan';
                                                break;
                                        }
                                    @endphp
                                    <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                                </dd>
                                <dt>Total</dt>
                                <dd class="text-gray-900 font-bold text-xl">Rp
                                    {{ number_format($transaction->total_amount, 0, ',', '.') }}</dd>
                            </dl>
                        </div>

                        <div class="card">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Paket & Pelanggan</h3>
                            <dl class="dl-grid text-sm">
                                <dt>Nama Paket</dt>
                                <dd>{{ $transaction->package->name ?? 'N/A' }}</dd>
                                <dt>Tanggal Tiket</dt>
                                <dd class="font-bold text-blue-600 text-base">
                                    {{ $transaction->ticket_date ? \Carbon\Carbon::parse($transaction->ticket_date)->format('d F Y') : 'Tidak ditentukan' }}
                                </dd>
                                <dt>Nama Pelanggan</dt>
                                <dd>{{ $transaction->user->nama ?? 'N/A' }}</dd>
                                <dt>Email Pelanggan</dt>
                                <dd>{{ $transaction->user->email ?? 'N/A' }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="card" x-data="{ selectedStatus: '{{ old('payment_status', '') }}' }">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h3>
                            <p class="text-sm text-gray-600 mb-4">Gunakan form di bawah ini untuk mengkonfirmasi
                                ketersediaan tiket, membatalkan pesanan, atau menandai pesanan sebagai selesai.</p>
                            <form action="{{ route('admin.pesanan.updateStatus', $transaction->id) }}" method="POST">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label for="payment_status" class="block text-sm font-medium text-gray-700">Set
                                            Status Menjadi:</label>
                                        <select id="payment_status" name="payment_status" x-model="selectedStatus"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm">
                                            <option value="" disabled>-- Pilih Aksi --</option>
                                            <option value="confirmed">Konfirmasi (Tiket Tersedia)</option>
                                            <option value="completed">Selesai (Pesanan Tuntas)</option>
                                            <option value="cancelled">Batalkan Pesanan</option>
                                        </select>
                                    </div>
                                    <div x-show="selectedStatus === 'cancelled'" x-transition x-cloak>
                                        <label for="reason" class="block text-sm font-medium text-gray-700">Alasan
                                            Pembatalan (Wajib diisi)</label>
                                        <input type="text" id="reason" name="reason"
                                            :required="selectedStatus === 'cancelled'"
                                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Contoh: Stok habis / permintaan pelanggan"
                                            value="{{ old('reason') }}">
                                    </div>
                                    <div class="border-t pt-4 text-right">
                                        <button type="submit" :disabled="!selectedStatus"
                                            x-on:click="if (!confirm('Anda yakin ingin mengubah status pesanan ini?')) { event.preventDefault(); }"
                                            class="inline-flex items-center text-sm bg-blue-700 hover:bg-blue-800 text-white font-medium px-4 py-2 rounded-lg shadow-sm transition disabled:opacity-50 disabled:cursor-not-allowed">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
