<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="png" href="/Asset/icon Web.png">
  @vite('resources/css/app.css')
  <title>Daftar Event - Tripnesia</title>

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
      <x-admin-navbar class="bg-gray-100 w-full">Event</x-admin-navbar>   

      <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Data Event</h1>

        @if(session('success'))
          <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        <div class="flex justify-end mb-4">
          <a href="{{ route('admin.event.create') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-medium px-4 py-2 rounded-lg transition">
            + Tambah Event
          </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-x-auto">
          <table class="min-w-full table-auto text-left text-sm">
            <thead class="bg-blue-900 text-white uppercase">
            <tr>
                <th class="px-6 py-3">Judul</th>
                <th class="px-6 py-3">Deskripsi</th>
                <th class="px-6 py-3">Tanggal</th>
                <th class="px-6 py-3">Lokasi</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
            @foreach($events as $event)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-semibold">{{ $event->title }}</td>
                <td class="px-6 py-4">{{ Str::limit($event->description, 50) }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                <td class="px-6 py-4">{{ $event->location }}</td>
    <td class="px-6 py-4 space-x-2 text-center">
      <a href="{{ route('admin.event.edit', $event->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
      <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus event ini?')">
        @csrf
        @method('DELETE')
        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Hapus</button>
      </form>
    </td>
  </tr>
  @endforeach
</tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
