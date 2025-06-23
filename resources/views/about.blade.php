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
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('storage/Asset/Creator/ilham.jpg') }}" alt="Foto profil anggota tim">
        
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Ilham Kurnia Bakhtiar</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">Project Manager</p>
        </div>
        
        <div class="mt-6 flex items-center justify-center gap-x-6">
          <a href="https://www.instagram.com/ilhamkurnia.b/" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 0C8.74 0 8.333.014 7.053.072 5.775.132 4.965.253 4.254.51c-.715.255-1.395.6-2.008 1.21-.613.608-.967 1.29-1.21 2.008-.256.712-.377 1.522-.437 2.8-.058 1.28-.072 1.69-.072 4.995 0 3.257.014 3.667.072 4.947.06 1.277.181 2.087.437 2.8s.6 1.39.967 2.007c.613.607 1.29.96 2.008 1.21.715.255 1.524.377 2.8.437 1.28.058 1.688.072 4.947.072 3.257 0 3.667-.014 4.947-.072 1.277-.06 2.087-.181 2.8-.437.715-.255 1.39-.6 2.007-1.21.607-.613.96-1.29 1.21-2.008.255-.713.377-1.523.437-2.8.058-1.28.072-1.688.072-4.947 0-3.257-.014-3.667-.072-4.947-.06-1.277-.181-2.087-.437-2.8a4.998 4.998 0 00-1.21-2.007 4.99 4.99 0 00-2.008-1.21c-.712-.255-1.522-.377-2.8-.437C15.667.014 15.257 0 12 0zm0 2.163c3.219 0 3.584.012 4.85.072 1.17.055 1.8.175 2.22.332.42.157.72.378.96.618.24.24.46.54.617.96.157.42.277 1.05.332 2.22.06 1.265.072 1.63.072 4.85 0 3.219-.012 3.584-.072 4.85-.055 1.17-.175 1.8-.332 2.22-.157.42-.378.72-.618.96-.24.24-.54.46-.96.617-.42.157-1.05.277-2.22.332-1.265.06-1.63.072-4.85.072-3.219 0-3.584-.012-4.85-.072-1.17-.055-1.8-.175-2.22-.332-.42-.157-.72-.378-.96-.618-.24-.24-.46-.54-.617-.96-.157-.42-.277-1.05-.332-2.22-.06-1.265-.072-1.63-.072-4.85 0-3.219.012-3.584.072-4.85.055-1.17.175-1.8.332-2.22.157-.42.378-.72.618-.96.24-.24.54-.46.96-.617.42-.157 1.05-.277 2.22-.332C8.37 2.175 8.735 2.163 12 2.163zm0 3.633a6.204 6.204 0 100 12.408 6.204 6.204 0 000-12.408zm0 2.163a4.041 4.041 0 110 8.082 4.041 4.041 0 010-8.082zm6.26-.786a1.458 1.458 0 100 2.916 1.458 1.458 0 000-2.916z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href=" https://www.linkedin.com/in/ilham-kurnia-bakhtiar-710a40326/" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">LinkedIn</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.78 7 2.972v6.263z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="https://github.com/IlhamKurniaBakhtiar" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">GitHub</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.47.087.683-.233.683-.526 0-.258-.009-1.045-.015-2.057-2.783.612-3.371-1.353-3.371-1.353-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.004.072 1.531 1.032 1.531 1.032.892 1.529 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.334-2.22-.253-4.555-1.113-4.555-4.931 0-1.096.393-1.983 1.03-2.687-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.379.202 2.398.099 2.65.648.704 1.03 1.591 1.03 2.687 0 3.829-2.339 4.673-4.566 4.92.359.309.678.92.678 1.855 0 1.336-.012 2.419-.012 2.747 0 .295.216.61.695.514C21.133 20.2 24 16.435 24 12.017 24 6.484 19.522 2 14 2h-2z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="mailto:ilhamkurniabakhtiar@gmail.com " class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Gmail</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/>
            </svg>
          </a>
        </div>
      </div>
      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('storage/Asset/Creator/robby.jpg') }}" alt="Foto profil anggota tim">
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Robby Septian Fajar</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">Programmer</p>
        </div>
        <div class="mt-6 flex items-center justify-center gap-x-6">
          <a href="https://www.instagram.com/robby.sf_?igsh=MW5wYjU5bnZ1NHE0Zg==" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 0C8.74 0 8.333.014 7.053.072 5.775.132 4.965.253 4.254.51c-.715.255-1.395.6-2.008 1.21-.613.608-.967 1.29-1.21 2.008-.256.712-.377 1.522-.437 2.8-.058 1.28-.072 1.69-.072 4.995 0 3.257.014 3.667.072 4.947.06 1.277.181 2.087.437 2.8s.6 1.39.967 2.007c.613.607 1.29.96 2.008 1.21.715.255 1.524.377 2.8.437 1.28.058 1.688.072 4.947.072 3.257 0 3.667-.014 4.947-.072 1.277-.06 2.087-.181 2.8-.437.715-.255 1.39-.6 2.007-1.21.607-.613.96-1.29 1.21-2.008.255-.713.377-1.523.437-2.8.058-1.28.072-1.688.072-4.947 0-3.257-.014-3.667-.072-4.947-.06-1.277-.181-2.087-.437-2.8a4.998 4.998 0 00-1.21-2.007 4.99 4.99 0 00-2.008-1.21c-.712-.255-1.522-.377-2.8-.437C15.667.014 15.257 0 12 0zm0 2.163c3.219 0 3.584.012 4.85.072 1.17.055 1.8.175 2.22.332.42.157.72.378.96.618.24.24.46.54.617.96.157.42.277 1.05.332 2.22.06 1.265.072 1.63.072 4.85 0 3.219-.012 3.584-.072 4.85-.055 1.17-.175 1.8-.332 2.22-.157.42-.378.72-.618.96-.24.24-.54.46-.96.617-.42.157-1.05.277-2.22.332-1.265.06-1.63.072-4.85.072-3.219 0-3.584-.012-4.85-.072-1.17-.055-1.8-.175-2.22-.332-.42-.157-.72-.378-.96-.618-.24-.24-.46-.54-.617-.96-.157-.42-.277-1.05-.332-2.22-.06-1.265-.072-1.63-.072-4.85 0-3.219.012-3.584.072-4.85.055-1.17.175-1.8.332-2.22.157-.42.378-.72.618-.96.24-.24.54-.46.96-.617.42-.157 1.05-.277 2.22-.332C8.37 2.175 8.735 2.163 12 2.163zm0 3.633a6.204 6.204 0 100 12.408 6.204 6.204 0 000-12.408zm0 2.163a4.041 4.041 0 110 8.082 4.041 4.041 0 010-8.082zm6.26-.786a1.458 1.458 0 100 2.916 1.458 1.458 0 000-2.916z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="https://linkedin.com/in/robby-septian-fajar-2b7b4b253/" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">LinkedIn</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.78 7 2.972v6.263z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="https://github.com/robby-sf" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">GitHub</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.47.087.683-.233.683-.526 0-.258-.009-1.045-.015-2.057-2.783.612-3.371-1.353-3.371-1.353-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.004.072 1.531 1.032 1.531 1.032.892 1.529 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.334-2.22-.253-4.555-1.113-4.555-4.931 0-1.096.393-1.983 1.03-2.687-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.379.202 2.398.099 2.65.648.704 1.03 1.591 1.03 2.687 0 3.829-2.339 4.673-4.566 4.92.359.309.678.92.678 1.855 0 1.336-.012 2.419-.012 2.747 0 .295.216.61.695.514C21.133 20.2 24 16.435 24 12.017 24 6.484 19.522 2 14 2h-2z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="mailto:robbyrobby9889@gmail.com.com" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Gmail</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2">
        <img class="size-48 rounded-full object-cover border-4 border-gray-100" src="{{ asset('storage/Asset/Creator/shofi.jpg') }}" alt="Foto profil anggota tim">
        <div class="mt-6">
          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900">Shofi Zahrotul Aulia</h3>
          <p class="text-base font-semibold leading-6 text-indigo-600">Requirement Analisyt</p>
        </div>
        <div class="mt-6 flex items-center justify-center gap-x-6">
          <a href="https://www.instagram.com/shfzl_aa/profilecard/?igsh=MWNnc3ViZzNjYWpmbw==" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 0C8.74 0 8.333.014 7.053.072 5.775.132 4.965.253 4.254.51c-.715.255-1.395.6-2.008 1.21-.613.608-.967 1.29-1.21 2.008-.256.712-.377 1.522-.437 2.8-.058 1.28-.072 1.69-.072 4.995 0 3.257.014 3.667.072 4.947.06 1.277.181 2.087.437 2.8s.6 1.39.967 2.007c.613.607 1.29.96 2.008 1.21.715.255 1.524.377 2.8.437 1.28.058 1.688.072 4.947.072 3.257 0 3.667-.014 4.947-.072 1.277-.06 2.087-.181 2.8-.437.715-.255 1.39-.6 2.007-1.21.607-.613.96-1.29 1.21-2.008.255-.713.377-1.523.437-2.8.058-1.28.072-1.688.072-4.947 0-3.257-.014-3.667-.072-4.947-.06-1.277-.181-2.087-.437-2.8a4.998 4.998 0 00-1.21-2.007 4.99 4.99 0 00-2.008-1.21c-.712-.255-1.522-.377-2.8-.437C15.667.014 15.257 0 12 0zm0 2.163c3.219 0 3.584.012 4.85.072 1.17.055 1.8.175 2.22.332.42.157.72.378.96.618.24.24.46.54.617.96.157.42.277 1.05.332 2.22.06 1.265.072 1.63.072 4.85 0 3.219-.012 3.584-.072 4.85-.055 1.17-.175 1.8-.332 2.22-.157.42-.378.72-.618.96-.24.24-.54.46-.96.617-.42.157-1.05.277-2.22.332-1.265.06-1.63.072-4.85.072-3.219 0-3.584-.012-4.85-.072-1.17-.055-1.8-.175-2.22-.332-.42-.157-.72-.378-.96-.618-.24-.24-.46-.54-.617-.96-.157-.42-.277-1.05-.332-2.22-.06-1.265-.072-1.63-.072-4.85 0-3.219.012-3.584.072-4.85.055-1.17.175-1.8.332-2.22.157-.42.378-.72.618-.96.24-.24.54-.46.96-.617.42-.157 1.05-.277 2.22-.332C8.37 2.175 8.735 2.163 12 2.163zm0 3.633a6.204 6.204 0 100 12.408 6.204 6.204 0 000-12.408zm0 2.163a4.041 4.041 0 110 8.082 4.041 4.041 0 010-8.082zm6.26-.786a1.458 1.458 0 100 2.916 1.458 1.458 0 000-2.916z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="https://www.linkedin.com/in/shofi-zahrotul-aulia-870555320?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">LinkedIn</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.78 7 2.972v6.263z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="https://github.com/shfzhlaa" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">GitHub</span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.47.087.683-.233.683-.526 0-.258-.009-1.045-.015-2.057-2.783.612-3.371-1.353-3.371-1.353-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.004.072 1.531 1.032 1.531 1.032.892 1.529 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.334-2.22-.253-4.555-1.113-4.555-4.931 0-1.096.393-1.983 1.03-2.687-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.379.202 2.398.099 2.65.648.704 1.03 1.591 1.03 2.687 0 3.829-2.339 4.673-4.566 4.92.359.309.678.92.678 1.855 0 1.336-.012 2.419-.012 2.747 0 .295.216.61.695.514C21.133 20.2 24 16.435 24 12.017 24 6.484 19.522 2 14 2h-2z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="mailto:shofiauliaaa76@gmail.com" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Gmail</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
    
  </div>
</div>
</body>
