<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ asset('Asset/icon Web.png') }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Kelola Paket' }} - Tripnesia</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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

            <x-admin-navbar class="bg-gray-100 w-full">
                {{ 'Package List' }}
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

                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.package.create') }}"
                        class="bg-blue-700 hover:bg-blue-800 text-white font-medium px-4 py-2 rounded-lg transition text-sm">
                        + Tambah Paket Baru
                    </a>
                </div>

                <div class="bg-white shadow-md rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Gambar</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Paket</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tiket Termasuk</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($packages as $package)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loop->iteration + $packages->firstItem() - 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img src="{{ asset('storage/' . $package->image) }}"
                                                alt="{{ $package->name }}" class="h-20 w-32 object-cover rounded-md">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $package->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $package->tickets }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Rp{{ number_format($package->price, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-4">
                                            <a href="{{ route('admin.package.edit', $package->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('admin.package.destroy', $package->id) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket \'{{ $package->name }}\' ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                            Tidak ada data paket.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($packages->hasPages())
                        <div class="px-6 py-3 bg-white border-t">
                            {{ $packages->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

</body>

</html>
