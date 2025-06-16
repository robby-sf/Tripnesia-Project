<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="png" href="/Asset/icon Web.png">
  @vite('resources/css/app.css')
  <title>Tripnesia</title>

  <style>[x-cloak] { display: none; }</style>
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
            
            <x-admin-navbar class="bg-gray-100 w-full">Destination</x-admin-navbar>   
            <div class="flex-1 p-6">
                
                <div class="flex justify-end mb-4">
                    <a href="/admin/destination/create" class="bg-blue-700 hover:bg-blue-800 text-white font-medium px-4 py-2 rounded-lg transition">
                        + Tambah Wisata Baru
                    </a>
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <table class="min-w-full table-auto text-left">
                        <thead class="bg-blue-900 text-white text-sm uppercase">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Alamat</th>
                                <th class="px-6 py-3">Jam Buka</th>
                                <th class="px-6 py-3">Jam Tutup</th>
                                <th class="px-6 py-3">Harga</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 divide-y divide-gray-200">
                            @forelse ($destinations as $index => $dest)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $dest->nama }}</td>
                                <td class="px-6 py-4">{{ $dest->alamat }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($dest->jam_buka)->format('H:i') }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($dest->jam_tutup)->format('H:i') }}</td>
                                <td class="px-6 py-4">Rp{{ number_format($dest->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 flex items-center space-x-7 justify-center">
                                    <!-- Detail (Magnifying Glass) -->
                                    <a href="/destination/{{ $dest->slug }}" class="text-blue-600 hover:text-blue-800" title="Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </a>


                                    <a href="/admin/destination/{{ $dest->id }}/edit" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <form action="{{  route('destination.delete', $dest->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500 py-6">Belum ada destinasi wisata.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
    </div>

    
</body>
</html>
