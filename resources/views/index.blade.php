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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

  
  <script>
  $(function () {
      $("#search").autocomplete({
          source: '/autocomplete',
          minLength: 1
      });
  });
  </script>

</head>
<body class="h-full">
  <!-- Navigasi -->
  <x-Navbar></x-Navbar>
  <!-- Sambutan -->
  <section
  class="h-screen bg-cover bg-center"
  style="background-image: url('{{ asset('Asset/Bromo.avif') }}');">
  <div class="bg-black/50 h-full flex items-center justify-center">
    <h1 class="text-white text-4xl lg:text-6xl font-bold">Discover Your Journey</h1>
  </div>
  </section>

    <!-- Event -->
  <section class="max-w-7xl mx-auto py-12 px-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-bold">Event Populer</h2>
      <a href="/event" class="text-blue-600 hover:underline">View More</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($events->take(6) as $event)
      <a href="{{ route('events.show', $event->slug) }}" class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden block">
        <img src="{{ asset('storage/events/' . $event->image) }}" class="w-full h-48 object-cover">
        <div class="p-5">
          <h3 class="text-xl font-semibold">{{ $event->title }}</h3>
          <p class="text-gray-600 text-sm">{{ Str::limit($event->description, 80) }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  <!-- Destination -->
  <section class="max-w-7xl mx-auto py-12 px-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-bold">Destinasi Favorit</h2>
      <a href="/destination" class="text-blue-600 hover:underline">View More</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($destinations->take(6) as $destination)
      <a href="/destination/{{ $destination->slug }}" class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden block">
        <img src="{{ asset('storage/Asset/' . $destination->gambar) }}" class="w-full h-48 object-cover">
        <div class="p-5">
          <h3 class="text-xl font-semibold">{{ $destination->nama }}</h3>
          <p class="text-gray-600 text-sm">{{ Str::limit($destination->deskripsi, 80) }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  <!-- Package -->
  <section class="max-w-7xl mx-auto py-12 px-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-bold">Paket Perjalanan</h2>
      <a href="/package" class="text-blue-600 hover:underline">View More</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($packages->take(6) as $package)
      <a href="{{ route('checkout.show', $package->id) }}" class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden block">
        <img src="{{ asset('storage/' . $package->image) }}" class="w-full h-48 object-cover">
        <div class="p-5">
          <h3 class="text-xl font-semibold">{{ $package->name }}</h3>
          <p class="text-gray-600 text-sm">{{ Str::limit($package->description, 80) }}</p>
          <p class="text-sm font-bold text-green-600 mt-2">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  <!-- Floating Chat Button WhatsApp -->
  <a href="https://wa.me/62895391671188" target="_blank"
     class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-full shadow-lg flex items-center gap-2 z-50">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M21 12a9 9 0 11-16.29-5.64L3 21l6.36-1.71A9 9 0 1121 12z"></path>
      <path d="M16 12.5c-.5.5-1.17 1-2 1.5s-1.5 1.5-2 1.5-1.5-1-2-1.5-1.5-1.5-2-2-1-1.17-1-2 .5-2 1.5-2.5"></path>
    </svg>
    Chat
  </a>

  </main>

  <footer class="bg-sky-900 text-center text-white">
    &copy; Tripnesia Co All Right Reserved
  </footer>

</body>
</html>