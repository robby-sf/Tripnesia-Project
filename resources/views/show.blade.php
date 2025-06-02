{{-- File: resources/views/admin/orders/show.blade.php --}}
<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('Asset/icon Web.png') }}"> {{-- Sesuaikan path jika perlu --}}
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Detail Pesanan' }} - Tripnesia</title>
    {{-- AlpineJS jika masih digunakan --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

        .status-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        /* green-100, green-800 */
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        /* yellow-100, yellow-800 */
        .status-failed {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* red-100, red-800 */
        .status-other {
            background-color: #e5e7eb;
            color: #374151;
        }

        /* gray-200, gray-700 */
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
    {{-- Asumsi komponen admin-navbar Anda sudah ada dan berfungsi --}}
    @if (View::exists('components.admin-navbar'))
        <x-admin-navbar></x-admin-navbar>
    @else
        <div class="bg-gray-800 text-white p-4 text-center">Admin Navbar Placeholder</div>
    @endif

    <div class="flex flex-1">
        {{-- Asumsi komponen admin-side-bar Anda sudah ada dan berfungsi --}}
        @if (View::exists('components.admin-side-bar'))
            <x-admin-side-bar class="w-64"></x-admin-side-bar> {{-- Sesuaikan lebar jika perlu --}}
        @else
            <div class="w-64 bg-gray-700 text-white p-4">Admin Sidebar Placeholder</div>
        @endif

        <main class="flex-1 p-6 md:p-8 overflow-y-auto">
            {{-- Asumsi komponen admin-header Anda sudah ada dan berfungsi --}}
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

            {{-- Pesan Flash Sukses/Error --}}
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
                {{-- Kolom Kiri: Detail Utama & Update Status --}}
                <div class="lg:col-span-2 bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Informasi Pesanan</h2>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4 text-sm">
                        <div>
                            <dt class="font-medium text-gray-500">ID Pesanan:</dt>
                            <dd class="text-gray-900 font-mono">{{ $transaction->order_id }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Tanggal Pesan:</dt>
                            <dd class="text-gray-900">{{ $transaction->created_at->format('d M Y, H:i:s') }}
                                ({{ $transaction->created_at->diffForHumans() }})</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Terakhir Update:</dt>
                            <dd class="text-gray-900">{{ $transaction->updated_at->format('d M Y, H:i:s') }}</dd>
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
                                    $currentStatusClass = 'status-other';
                                    $currentStatusText = ucfirst($transaction->payment_status);
                                    switch (strtolower($transaction->payment_status)) {
                                        case 'success':
                                        case 'settlement':
                                            $currentStatusClass = 'status-success';
                                            break;
                                        case 'pending':
                                        case 'challenge':
                                            $currentStatusClass = 'status-pending';
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
                        @if ($transaction->snap_token)
                            <div>
                                <dt class="font-medium text-gray-500">Snap Token:</dt>
                                <dd class="text-gray-900 break-all font-mono text-xs">{{ $transaction->snap_token }}
                                </dd>
                            </div>
                        @endif
                    </dl>

                    <hr class="my-8">

                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Update Status Pembayaran</h3>
                    <form action="{{ route('admin.pesanan.updateStatus', $transaction->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-1">Pilih
                                Status Baru:</label>
                            <select id="payment_status" name="payment_status"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm">
                                @foreach ($validStatuses as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ strtolower($transaction->payment_status) == strtolower($value) ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan Admin
                                (Opsional, akan ditambahkan ke catatan sebelumnya):</label>
                            <textarea id="admin_notes" name="admin_notes" rows="3"
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Contoh: Pembayaran dikonfirmasi manual setelah pengecekan transfer bank."></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="inline-flex items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Perubahan Status
                            </button>
                        </div>
                    </form>

                    @if ($transaction->admin_notes)
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Riwayat Catatan Admin:</h3>
                            <pre class="text-xs bg-gray-50 p-4 rounded-md whitespace-pre-wrap border border-gray-200 max-h-60 overflow-y-auto">{{ $transaction->admin_notes }}</pre>
                        </div>
                    @endif
                </div>

                {{-- Kolom Kanan: Info Pelanggan & Paket --}}
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
                                {{-- Tambahkan info user lain jika perlu --}}
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
                                {{-- <p><strong>Harga Paket Asli:</strong> Rp {{ number_format($transaction->package->price, 0, ',', '.') }}</p> --}}
                                {{-- Tambahkan info paket lain jika perlu --}}
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
