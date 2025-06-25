<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="png" href="/Asset/icon Web.png">
  @vite('resources/css/app.css')
  <title>Hasil Pencarian - Tripnesia</title>

  <style>[x-cloak] { display: none; }</style>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full flex flex-col">

  <x-Navbar />

  <main class="flex-grow container mx-auto px-4 py-8">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Hasil Pencarian untuk: "<span class="text-yellow-500">{{ $query }}</span>"</h2>

    <div class="mb-10">
      <h3 class="text-2xl font-bold text-gray-700 mb-5 border-b-2 border-yellow-500 pb-2">Destinasi</h3>
      @if($destinations->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          @foreach($destinations as $destination)
            <a href="{{ url('/destination/' . $destination->slug) }}" class="block rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 bg-white overflow-hidden">
              <img src="{{ '/storage/Asset/' . ($destination->gambar ?? 'default.jpg') }}" class="h-52 w-full object-cover rounded-t-xl" alt="{{ $destination->nama }}">
              <div class="p-5">
                <h4 class="font-bold text-xl text-gray-900 mb-2">{{ $destination->nama }}</h4>
                <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($destination->deskripsi, 120) }}</p>
              </div>
            </a>
          @endforeach
        </div>
      @else
        <p class="text-gray-600 text-lg py-4 px-6 bg-blue-50 rounded-lg border border-blue-200">Tidak ada destinasi yang ditemukan untuk pencarian Anda.</p>
      @endif
    </div>

    <hr class="border-gray-300 my-8"> 

    <div class="mb-10">
      <h3 class="text-2xl font-bold text-gray-700 mb-5 border-b-2 border-yellow-500 pb-2">Event</h3>
      @if($events->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          @foreach($events as $event)
            <a href="{{ url('/destination/' . $event->slug) }}" class="block rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 bg-white overflow-hidden">
              <img src="{{'/storage/events/' .  ($event->image ?? 'default.jpg') }}" class="h-52 w-full object-cover rounded-t-xl" alt="{{ $event->title }}">
              <div class="p-5">
                <h4 class="font-bold text-xl text-gray-900 mb-2">{{ $event->title }}</h4>
                <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($event->description, 120) }}</p>
              </div>
            </a>
          @endforeach
        </div>
      @else
        <p class="text-gray-600 text-lg py-4 px-6 bg-blue-50 rounded-lg border border-blue-200">Tidak ada event yang ditemukan untuk pencarian Anda.</p>
      @endif
    </div>
  </main>

  <footer class="bg-[#2F3C4B] text-center text-white py-4 mt-auto">
    &copy; Tripnesia Co All Right Reserved
  </footer>
</body>
</html>