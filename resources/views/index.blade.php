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

</head>
<body class="h-full">
  <!-- Navigasi -->
  <x-Navbar></x-Navbar>
  <!-- Sambutan -->
  <section
  class="h-screen bg-cover bg-center"
  style="background-image: url('/Asset/Bromo.avif');">
  <div class="bg-black/50 h-full flex items-center justify-center">
    <h1 class="text-white text-4xl lg:text-6xl font-bold">Discover Your Journey</h1>
  </div>
  </section>

  <!-- Rekomendasi wisata -->
  <div class="flex flex-col p-8">
    <h2 class="font-bold text-2xl lg:text-4xl text-center mb-5">Rekomendasi Pejalanan Untukmu</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <div class="rounded-lg shadow hover:shadow-lg transition">
        <img src="/Asset/Bali.jpg" alt="Pura bali" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-5">
          <h4 class="text-xl font-semibold ">Bali</h4>
          <p>Jelajahi keindahan alam bali</p>
        </div>
      </div>

      <div class="rounded-lg shadow hover:shadow-lg transition">
        <img src="/Asset/Bromo.avif" alt="Pura bali" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-5">
          <h4 class="text-xl font-semibold ">Bromo</h4>
          <p>Jelajahi keindahan alam bali</p>
        </div>
      </div>

      <div class="rounded-lg shadow hover:shadow-lg transition">
        <img src="/Asset/Raja Ampat.jpg" alt="Pura bali" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-5">
          <h4 class="text-xl font-semibold ">Raja Ampat</h4>
          <p>Jelajahi keindahan alam bali</p>
        </div>
      </div>

    </div>

  </div>

  <!-- Rekomendasi Paket Perjalanan-->
  <main class="flex flex-col p-8">
    <h2 class="font-bold text-2xl lg:text-4xl text-center mb-5">Paket Perjalanan Untuk Kamu</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <div class="rounded-lg shadow hover:shadow-lg transition">
        <img src="/Asset/Bali.jpg" alt="Pura bali" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-5">
          <h4 class="text-xl font-semibold ">Bali</h4>
          <p>Jelajahi keindahan alam bali</p>
          <div class="flex items-center">
            <span class="text-yellow-500 mr-1">★★★★☆</span> 
            <span class="text-gray-500">(4.5)</span>
          </div>
        </div>
      </div>

      <div class="rounded-lg shadow hover:shadow-lg transition">
        <img src="/Asset/Bromo.avif" alt="Pura bali" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-5">
          <h4 class="text-xl font-semibold ">Bromo</h4>
          <p>Jelajahi keindahan alam bali</p>
          <div class="flex items-center">
            <span class="text-yellow-500 mr-1">★★★☆☆</span> 
            <span class="text-gray-500">(3.8)</span>
          </div>
        </div>
      </div>

      <div class="rounded-lg shadow hover:shadow-lg transition">
        <img src="/Asset/Raja Ampat.jpg" alt="Pura bali" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-5">
          <h4 class="text-xl font-semibold ">Raja Ampat</h4>
          <p>Jelajahi keindahan alam bali</p>
          <div class="flex items-center">
            <span class="text-yellow-500 mr-1">★★★★☆</span> 
            <span class="text-gray-500">(4.8)</span>
          </div>
        </div>
      </div>

    </div>

  </main>

  <footer class="bg-sky-900 text-center text-white">
    &copy; Tripnesia Co All Right Reserved
  </footer>

</body>
</html>