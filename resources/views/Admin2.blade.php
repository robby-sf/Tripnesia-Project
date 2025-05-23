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

<body>
        <x-Navbar></x-Navbar>
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg mt-15">
          <h1 class="text-3xl font-bold text-gray-800 mb-4">Pantai Kuta, Bali</h1>

          <img 
            src="{{ asset('Asset/kuta.jpg') }}" 
            alt="Pantai Kuta" 
            class="w-full h-64 object-cover rounded-lg mb-6"
          />

          <p class="text-gray-700 mb-4">
            Pantai Kuta adalah salah satu destinasi wisata paling populer di Bali. Terkenal dengan pasir putihnya, ombak yang cocok untuk surfing, serta sunset yang memukau. Pantai ini juga dekat dengan banyak restoran, hotel, dan pusat perbelanjaan.
          </p>

          <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Informasi</h2>
            <ul class="pr-2 list-inside text-gray-700">
              <li><strong>Alamat:</strong> Kuta, Kabupaten Badung, Bali</li>
              <li><strong>Jam Buka:</strong> 06.00 - 19.00 WITA</li>
              <li><strong>Tiket Masuk:</strong> Gratis</li>
            </ul>
          </div>

          <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Lokasi</h2>
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126462.9436992753!2d115.1114509518586!3d-8.723744254645185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2470b1c143b81%3A0x5030bfbca832320!2sPantai%20Kuta!5e0!3m2!1sid!2sid!4v1682330241517!5m2!1sid!2sid" 
              width="100%" 
              height="300" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>

          <div class="border-t pt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Ulasan Pengunjung</h2>

            <div class="space-y-4 mb-6">
              <div class="bg-gray-50 p-4 rounded-lg shadow">
                <p class="font-semibold text-gray-800">Andi</p>
                <p class="text-yellow-500 mb-1">★★★★★</p>
                <p class="text-gray-700">Pantainya sangat indah dan bersih. Sunset-nya luar biasa!</p>
              </div>
              <div class="bg-gray-50 p-4 rounded-lg shadow">
                <p class="font-semibold text-gray-800">Sari</p>
                <p class="text-yellow-500 mb-1">★★★★☆</p>
                <p class="text-gray-700">Tempatnya ramai tapi sangat seru. Banyak pilihan makanan!</p>
              </div>
            </div>
          </div>
        </div>

</body>
</html>
