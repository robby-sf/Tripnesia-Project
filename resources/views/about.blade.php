<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="png" href="/Asset/icon Web.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <title>Tripnesia</title>

  <style>[x-cloak] { display: none; }</style>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    <x-Navbar></x-Navbar>

  <section class="w-full h-80 bg-cover bg-center" style="background-image: url('{{ asset('Asset/Gunung Agung.jpg') }}');">
    <div class="bg-black/50 w-full h-80 flex items-center justify-center">
        <div class="bg-gray-900/30 w-full">
            <div class="justify-center p-5">
            <h1 class="text-white text-xl md:text-2xl lg:text-3xl font-bold text-center" style="font-family: 'Poppins', sans-serif;">In every hidden beauty lies an opportunity to explore. We're here to bridge the gap between dreams and journeys.</h1>
            </div> 
        </div> 
    </div>
  </section>

  <div class="w-full bg-[#ffffff] flex items-center justify-center">
    <div class="max-w-6xl text-center p-5 mx-auto mt-10 " style="font-family: 'Poppins', sans-serif; ">
      <h1 class="mb-6 text-4xl font-semibold ">
        Tripnesia adalah platform pariwisata terbesar di Indonesia
      </h1>
      <p class="mb-3">
        Tripnesia merupakan sebuah platform informasi sekaligus perjalanan yang menyediakan berbagai destinasi wisata alam yang ada di Indonesia.
      </p>
      <p>
        Kami percaya bahwa keindahan alam Indonesia ada untuk dinikmati seluruh orang, melalui platform Tripnesia kami menyediakan berbagai informasi mengenai berbagai destinasi untuk semua orang.
      </p>
    </div>
  </div>

<div class="w-full bg-white py-16 sm:py-24" style="font-family: 'Poppins', sans-serif;">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">

    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
        Meet Our Team
      </h2>
      <p class="mt-4 text-lg leading-8 text-gray-600">
        Kami adalah tim profesional yang berdedikasi untuk memberikan yang terbaik.
      </p>
    </div>

    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      
      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('Asset/profilekosong.jpg') }}" alt="Foto profil anggota tim">
        
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Nama Anggota Pertama</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">Programmer</p>
        </div>
        
        <div class="mt-4 flex items-center gap-x-4">
          <a href="#" class="text-gray-400 hover:text-indigo-600">
            <span class="sr-only">LinkedIn</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-indigo-600">
            <span class="sr-only">Twitter</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-.424.727-.666 1.581-.666 2.477 0 1.921.977 3.614 2.468 4.603-.91-.028-1.77-.279-2.523-.694v.058c0 2.682 1.903 4.915 4.426 5.42-.462.125-.948.192-1.45.192-.356 0-.702-.034-1.04-.098.704 2.198 2.747 3.803 5.172 3.847-1.892 1.482-4.275 2.364-6.872 2.364-.446 0-.888-.026-1.325-.077 2.448 1.568 5.358 2.484 8.494 2.484 10.191 0 15.776-8.433 15.776-15.776 0-.24-.005-.479-.015-.718.981-.703 1.831-1.583 2.509-2.6z"/></svg>
          </a>
        </div>
      </div>

      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('Asset/profilekosong.jpg') }}" alt="Foto profil anggota tim">
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Nama Anggota Kedua</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">UI/UX Designer</p>
        </div>
        </div>

      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('Asset/profilekosong.jpg') }}" alt="Foto profil anggota tim">
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Nama Anggota Ketiga</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">Project Manager</p>
        </div>
        </div>

    </div>
  </div>
</div></body>