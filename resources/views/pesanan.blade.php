{{-- File: resources/views/pesanan.blade.php --}}
<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ asset('Asset/icon Web.png') }}"> {{-- Sesuaikan path jika perlu --}}
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Daftar Pesanan' }} - Tripnesia</title>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen">
    {{-- Menggunakan komponen Blade Anda yang sudah ada --}}
    <x-admin-navbar></x-admin-navbar>

    <div class="flex flex-1">
        <x-admin-side-bar class="w-64"></x-admin-side-bar> {{-- Pastikan class w-64 atau yang sesuai ada --}}

        <main class="flex-1 p-6 md:p-8 overflow-x-auto">
            <x-admin-header>
                {{ $title ?? 'Daftar Pesanan' }}
            </x-admin-header>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded-md text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-md text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID Pesanan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pelanggan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Paket</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $transaction->order_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $transaction->user->nama ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $transaction->package->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp
                                        {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                                    {{-- File: resources/views/pesanan.blade.php (atau admin/orders/index.blade.php) --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusClass = 'bg-gray-100 text-gray-800';
                                            $statusText = ucfirst($transaction->payment_status);
                                            switch (strtolower($transaction->payment_status)) {
                                                case 'success':
                                                case 'settlement':
                                                    $statusClass = 'bg-yellow-100 text-yellow-800';
                                                    $statusText = 'Perlu Dikonfirmasi'; // Status lebih deskriptif untuk admin
                                                    break;
                                                case 'confirmed': // Status baru
                                                    $statusClass = 'bg-green-100 text-green-800';
                                                    $statusText = 'Terkonfirmasi';
                                                    break;
                                                case 'refunded': // Status baru
                                                    $statusClass = 'bg-gray-500 text-white';
                                                    $statusText = 'Direfund';
                                                    break;
                                                case 'pending':
                                                case 'challenge':
                                                    $statusClass = 'bg-blue-100 text-blue-800';
                                                    $statusText = 'Menunggu Pembayaran';
                                                    break;
                                                case 'failed':
                                                case 'expire':
                                                case 'cancelled':
                                                case 'deny':
                                                    $statusClass = 'bg-red-100 text-red-800';
                                                    break;
                                            }
                                        @endphp
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                            {{ $statusText }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $transaction->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        {{-- Pastikan nama rute 'admin.pesanan.show' dan 'admin.pesanan.destroy' sudah benar --}}
                                        <a href="{{ route('admin.pesanan.show', $transaction->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Detail</a>
                                        <form action="{{ route('admin.pesanan.destroy', $transaction->id) }}"
                                            method="POST" class="inline-block"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan {{ $transaction->order_id }} ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada
                                        data pesanan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($transactions->hasPages())
                    <div class="px-6 py-3 bg-white border-t">
                        {{ $transactions->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>

</html>
