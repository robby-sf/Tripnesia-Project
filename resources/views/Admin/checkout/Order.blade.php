<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ asset('Asset/icon Web.png') }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Daftar Pesanan' }} - Tripnesia</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        }

        .status-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-completed {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-pending {
            background-color: #e0e7ff;
            color: #4338ca;
        }

        .status-failed {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .status-refunded {
            background-color: #e5e7eb;
            color: #374151;
        }
    </style>
</head>

<body class="font-inter h-full">

    <div class="flex flex-nowrap w-full">


        <main class="flex flex-col w-full">

            <x-admin-navbar class="bg-gray-100 w-full">
                {{ $title ?? 'Daftar Pesanan' }}
            </x-admin-navbar>

            <div class="flex-1 p-6 md:p-8">

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
                                        Tanggal Tiket</th>
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

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-semibold">
                                            {{ $transaction->ticket_date ? \Carbon\Carbon::parse($transaction->ticket_date)->format('d M Y') : 'N/A' }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp
                                            {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusClass = 'status-refunded';
                                                $statusText = ucfirst(
                                                    str_replace('_', ' ', $transaction->payment_status),
                                                );

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
                                            <a href="{{ route('admin.pesanan.show', $transaction->id) }}"
                                                class="text-blue-600 hover:text-blue-900">Detail</a>
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
                                        <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada
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
            </div>
        </main>
    </div>

</body>

</html>
