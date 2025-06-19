<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ asset('Asset/icon Web.png') }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Tambah Paket Baru' }} - Tripnesia</title>
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
                {{ $title ?? 'Tambah Paket Baru' }}
            </x-admin-navbar>

            <div class="flex-1 p-6 md:p-8">
                <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h3 class="text-lg font-semibold text-gray-800">Formulir Paket Baru</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="md:col-span-1">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Paket</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                                        required>
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-1">
                                    <label for="price"
                                        class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('price') border-red-500 @enderror"
                                        required>
                                    @error('price')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="tickets" class="block text-sm font-medium text-gray-700 mb-1">Tiket
                                        Termasuk</label>
                                    <input type="text" name="tickets" id="tickets" value="{{ old('tickets') }}"
                                        placeholder="Contoh: 1 tiket hotel, 1 tiket wisata"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('tickets') border-red-500 @enderror"
                                        required>
                                    @error('tickets')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                    <textarea name="description" id="description" rows="5"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('description') border-red-500 @enderror"
                                        required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar
                                        Paket</label>
                                    <input type="file" name="image" id="image"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200"
                                        required>
                                    @error('image')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="bg-gray-50 px-6 py-4 flex justify-end items-center space-x-3">
                            <a href="{{ route('admin.package.index') }}"
                                class="bg-white hover:bg-gray-100 text-gray-700 font-medium px-4 py-2 rounded-lg transition text-sm border border-gray-300">
                                Batal
                            </a>
                            <button type="submit"
                                class="bg-blue-700 hover:bg-blue-800 text-white font-medium px-4 py-2 rounded-lg transition text-sm">
                                Simpan Paket
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
