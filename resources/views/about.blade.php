<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="png" href="/Asset/icon Web.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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

    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      
      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('Asset/profilekosong.jpg') }}" alt="Foto profil anggota tim">
        
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Nama Anggota Pertama</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">Programmer</p>
        </div>
        
        <div class="mt-6 flex items-center justify-center gap-x-6">
          <a href="https://instagram.com/USERNAME_ANDA" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <radialGradient id="ig-gradient" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse">
                  <stop offset="0%" stop-color="#feda75"/>
                  <stop offset="50%" stop-color="#d62976"/>
                  <stop offset="100%" stop-color="#4f5bd5"/>
                </radialGradient>
              </defs>
              <path fill="url(#ig-gradient)" d="M34.5 4h-21C8.46 4 4 8.46 4 13.5v21C4 39.54 8.46 44 13.5 44h21c5.04 0 9.5-4.46 9.5-9.5v-21C44 8.46 39.54 4 34.5 4zM24 33.5c-5.24 0-9.5-4.26-9.5-9.5s4.26-9.5 9.5-9.5 9.5 4.26 9.5 9.5-4.26 9.5-9.5 9.5zm10.5-17a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z"/>
            </svg>

          </a>
          <a href="https://linkedin.com/in/USERNAME_ANDA" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">LinkedIn</span>
            <svg class="h-6 w-6 rounded-4xl" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <rect width="24" height="24" fill="#0077B5"/>
              <path fill="#FFFFFF" d="M5.3 9H8.1V19H5.3V9ZM6.7 4.8C7.6 4.8 8.3 5.5 8.3 6.4C8.3 7.3 7.6 8 6.7 8C5.8 8 5.1 7.3 5.1 6.4C5.1 5.5 5.8 4.8 6.7 4.8ZM9.9 9H12.5V10.3H12.5C12.9 9.6 13.8 8.8 15.1 8.8C17.7 8.8 18 10.5 18 12.6V19H15.2V13.3C15.2 12.1 15.2 10.6 13.6 10.6C12 10.6 11.8 11.9 11.8 13.2V19H9.9V9Z"/>
            </svg>

          </a>
          <a href="https://linkedin.com/in/USERNAME_ANDA" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Facebook</span>
            <svg class="h-6 w-6" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
              <path fill="#3B5998" d="M24 4C12.96 4 4 12.96 4 24c0 9.92 7.26 18.12 16.75 19.73V30h-5v-6h5v-4.5c0-4.97 2.96-7.75 7.5-7.75 2.18 0 4.5.4 4.5.4v5h-2.54c-2.5 0-3.46 1.56-3.46 3.2V24h5.9l-.94 6h-4.96v13.73C36.67 42.1 44 33.94 44 24c0-11.04-8.96-20-20-20z"/>
            </svg>

          </a>
          <a href="mailto:email.anda@gmail.com" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Gmail</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/>
            </svg>
          </a>
        </div>
      </div>
      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('Asset/profilekosong.jpg') }}" alt="Foto profil anggota tim">
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Nama Anggota Kedua</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">UI/UX Designer</p>
        </div>
        <div class="mt-6 flex items-center justify-center gap-x-6">
          <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            </a>
          <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">LinkedIn</span>
            </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Gmail</span>
            </a>
        </div>
      </div>

      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('Asset/profilekosong.jpg') }}" alt="Foto profil anggota tim">
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Nama Anggota Ketiga</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">Project Manager</p>
        </div>
        <div class="mt-6 flex items-center justify-center gap-x-6">
          <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            </a>
          <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">LinkedIn</span>
            </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Gmail</span>
            </a>
        </div>
      </div>
    </div>
    
  </div>
</div>
</body>