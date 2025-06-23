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
            
            <x-admin-navbar class="bg-gray-100 w-full">User List</x-admin-navbar>   
            <div class="flex-1 p-6">

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <table class="min-w-full table-auto text-left">
                        <thead class="bg-blue-900 text-white text-sm uppercase">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Role</th>
                                <th class="px-6 py-3">Nomor Telpon</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 divide-y divide-gray-200">
                            @forelse ($users as $index => $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $user->nama }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->role }}</td>
                                <td class="px-6 py-4">{{ $user->nomorTelp ?? 'Belum Mengisi' }}</td>
                                <td class="px-6 py-4 flex items-center space-x-7 justify-center">
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
