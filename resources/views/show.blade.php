<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('Asset/icon Web.png') }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Detail Pesanan' }} - Tripnesia</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .status-badge {
            display: inline-block;
            padding: 0.3em 0.6em;
            font-size: 0.85em;
            font-weight: 600;
            border-radius: 0.25rem;
            line-height: 1;
        }

        .status-confirmed {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-success {
            background-color: #fef9c3;
            color: #854d0e;
        }

        .status-pending {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-failed {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .status-refunded {
            background-color: #e5e7eb;
            color: #374151;
        }

        dl dt {
            margin-bottom: 0.25rem;
        }

        dl dd {
            margin-bottom: 0.75rem;
            margin-left: 0;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    @if (View::exists('components.admin-navbar'))
        <x-admin-navbar></x-admin-navbar>
    @else
        <div class="bg-gray-800 text-white p-4 text-center">Admin Navbar Placeholder</div>
    @endif

    <div class="flex flex-1">
        @if (View::exists('components.admin-side-bar'))
            <x-admin-side-bar class="w-64"></x-admin-side-bar>
        @else
            <div class="w-64 bg-gray-700 text-white p-4">Admin Sidebar Placeholder</div>
        @endif

        <main class="flex-1 p-6 md:p-8 overflow-y-auto">
            @if (View::exists('components.admin-header'))
                <x-admin-header>
                    <div class="flex justify-between items-center w-full">
                        <h1 class="text-xl md:text-2xl font-semibold text-gray-700">{{ $title }}</h1>
                        <a href="{{ route('admin.pesanan.index') }}"
                            class="text-sm bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm transition duration-150 ease-in-out">
                            &larr; Kembali ke Daftar Pesanan
                        </a>
                    </div>
                </x-admin-header>
            @else
                <div class="bg-white shadow p-4 mb-6 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-700">{{ $title }}</h1>
                    <a href="{{ route('admin.pesanan.index') }}"
                        class="text-sm text-blue-600 hover:text-blue-800">&larr; Kembali ke Daftar Pesanan</a>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-300 rounded-md text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-700 border border-red-300 rounded-md text-sm">
                    <strong class="font-bold">Oops! Ada beberapa kesalahan:</strong>
                    <ul class="list-disc pl-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Informasi Pesanan</h2>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4 text-sm">
                        <div>
                            <dt class="font-medium text-gray-500">ID Pesanan:</dt>
                            <dd class="text-gray-900 font-mono">{{ $transaction->order_id }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Tanggal Pesan:</dt>
                            <dd class="text-gray-900">{{ $transaction->created_at->format('d M Y, H:i:s') }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Total Pembayaran:</dt>
                            <dd class="text-gray-900 font-semibold text-lg">Rp
                                {{ number_format($transaction->total_amount, 0, ',', '.') }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Status Saat Ini:</dt>
                            <dd>
                                @php
                                    $currentStatusClass = 'status-refunded';
                                    $currentStatusText = ucfirst($transaction->payment_status);
                                    switch (strtolower($transaction->payment_status)) {
                                        case 'success':
                                        case 'settlement':
                                            $currentStatusClass = 'status-success';
                                            $currentStatusText = 'Perlu Dikonfirmasi';
                                            break;
                                        case 'confirmed':
                                            $currentStatusClass = 'status-confirmed';
                                            $currentStatusText = 'Terkonfirmasi';
                                            break;
                                        case 'pending':
                                        case 'challenge':
                                            $currentStatusClass = 'status-pending';
                                            $currentStatusText = 'Menunggu Pembayaran';
                                            break;
                                        case 'failed':
                                        case 'expire':
                                        case 'cancelled':
                                        case 'deny':
                                            $currentStatusClass = 'status-failed';
                                            break;
                                    }
                                @endphp
                                <span class="status-badge {{ $currentStatusClass }}">{{ $currentStatusText }}</span>
                            </dd>
                        </div>
                    </dl>

                    <hr class="my-8">

                    @if (in_array($transaction->payment_status, ['success', 'settlement']))
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Aksi Konfirmasi Pesanan</h3>
                        <div class="border-2 border-yellow-200 bg-yellow-50 p-4 rounded-md">
                            <p class="text-sm text-yellow-800 mb-4">Pesanan ini telah dibayar oleh pelanggan. Silakan
                                konfirmasi ketersediaan tiket atau proses refund jika tiket tidak tersedia.</p>
                            <div class="flex flex-col sm:flex-row sm:items-start sm:space-x-4 space-y-4 sm:space-y-0">
                                <form action="{{ route('admin.pesanan.confirm', $transaction->id) }}" method="POST"
                                    class="flex-shrink-0"
                                    onsubmit="return confirm('Anda yakin ingin mengkonfirmasi ketersediaan tiket untuk pesanan ini?');">
                                    @csrf
                                    <button type="submit"
                                        class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        ✅ Konfirmasi Ketersediaan
                                    </button>
                                </form>

                                <form action="{{ route('admin.pesanan.refund', $transaction->id) }}" method="POST"
                                    class="w-full"
                                    onsubmit="return confirm('PERINGATAN: Anda akan memproses PENGEMBALIAN DANA untuk pesanan ini. Lanjutkan?');">
                                    @csrf
                                    <div
                                        class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-2">
                                        <input type="text" name="reason" placeholder="Alasan refund (wajib diisi)"
                                            required
                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <button type="submit"
                                            class="w-full sm:w-auto flex-shrink-0 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            ❌ Tolak & Refund
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                    <div class="mt-8 opacity-60 hover:opacity-100 transition-opacity">
                        <h3 class="text-base font-semibold text-gray-600 mb-4">Opsi Update Status Manual (Tingkat
                            Lanjut)</h3>
                        <form action="{{ route('admin.pesanan.updateStatus', $transaction->id) }}" method="POST">
                            @csrf
                            <div class="flex items-end space-x-2">
                                <div class="flex-grow">
                                    <label for="payment_status" class="block text-xs font-medium text-gray-700">Pilih
                                        Status Baru:</label>
                                    <select id="payment_status" name="payment_status"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm">
                                        @foreach ($validStatuses as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ strtolower($transaction->payment_status) == strtolower($value) ? 'selected' : '' }}>
                                                {{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit"
                                    class="py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    @if ($transaction->admin_notes)
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Riwayat Catatan Admin:</h3>
                            <pre class="text-xs bg-gray-50 p-3 rounded-md whitespace-pre-wrap border border-gray-200 max-h-60 overflow-y-auto">{{ $transaction->admin_notes }}</pre>
                        </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-3">Informasi Pelanggan</h3>
                        @if ($transaction->user)
                            <dl class="space-y-2 text-sm">
                                <div>
                                    <dt class="font-medium text-gray-500">Nama:</dt>
                                    <dd class="text-gray-900">{{ $transaction->user->nama }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-500">Email:</dt>
                                    <dd class="text-gray-900">{{ $transaction->user->email }}</dd>
                                </div>
                            </dl>
                        @else
                            <p class="text-sm text-gray-500">Data pelanggan tidak ditemukan atau telah dihapus.</p>
                        @endif
                    </div>

                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-3">Informasi Paket</h3>
                        @if ($transaction->package)
                            <dl class="space-y-2 text-sm">
                                <div>
                                    <dt class="font-medium text-gray-500">Nama Paket:</dt>
                                    <dd class="text-gray-900">{{ $transaction->package->name }}</dd>
                                </div>
                            </dl>
                        @else
                            <p class="text-sm text-gray-500">Data paket tidak ditemukan atau telah dihapus.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-3">Detail Pembayaran (Data dari
                    Midtrans)</h3>
                @if ($transaction->payment_details)
                    <pre class="text-xs bg-gray-50 p-4 rounded-md overflow-x-auto break-all border border-gray-200 max-h-96"><code>{{ json_encode(json_decode($transaction->payment_details), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) }}</code></pre>
                @else
                    <p class="text-sm text-gray-500">Tidak ada detail pembayaran dari Midtrans yang tersimpan untuk
                        transaksi ini.</p>
                @endif
            </div>

        </main>
    </div>
</body>

</html>
