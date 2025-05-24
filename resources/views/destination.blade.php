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
  <style>
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>


</head>

<body>
     <x-Navbar></x-Navbar>

  <section class="relative bg-cover bg-center h-[450px]" style="background-image: url('{{ asset('Asset/Raja Ampat.jpg') }}')">
    <div class="absolute inset-0 bg-black/50 h-[450px] flex flex-col items-center justify-center text-white">
      <h2 class="text-4xl md:text-5xl font-bold">Temukan Surga Tersembunyi di Indonesia</h2>
      <p class="mt-4 text-lg md:text-xl">Dari pegunungan sejuk hingga laut tropis yang jernih</p>
    </div>
  </section>

  <section class="py-16 bg-white relative" x-data="{
    scrollLeft() { $refs.slider.scrollBy({ left: -300, behavior: 'smooth' }) },
    scrollRight() { $refs.slider.scrollBy({ left: 300, behavior: 'smooth' }) }
  }">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-3xl font-semibold mb-10 text-center">
        Destinasi Wisata Yang Mungkin Kamu Suka
      </h2>

        <div class="relative">
          <div class="flex overflow-x-auto space-x-6 pb-4 scroll-smooth no-scrollbar" x-ref="slider">
            <template x-for="(dest, index) in [
              { img: '/Asset/Raja Ampat.jpg', title: 'Raja Ampat', desc: 'Keindahan bawah laut Papua' },
              { img: '/Asset/Bromo.avif', title: 'Gunung Bromo', desc: 'Sunrise menawan' },
              { img: '/Asset/Labuan Bajo.jpg', title: 'Labuan Bajo', desc: 'Gerbang menuju Komodo' },
              { img: '/Asset/Bali.jpg', title: 'Bali', desc: 'Pulau dewata' },
              { img: '/Asset/Dieng.webp', title: 'Dieng', desc: 'Negeri di atas awan' },
              { img: '/Asset/Pulau Komodo.jpg', title: 'Pulau Komodo', desc: 'Habitat komodo asli' }
            ]" :key="index">
              <div class="min-w-[250px] flex-shrink-0 bg-white rounded-xl shadow-md 
                          transition-transform transform hover:scale-105 duration-300 ease-in-out overflow-hidden">
                <img :src="dest.img" class="w-full h-40 object-cover rounded-t-xl" />
                <div class="p-4">
                  <h4 class="font-bold text-lg" x-text="dest.title"></h4>
                  <p class="text-sm text-gray-600" x-text="dest.desc"></p>
                </div>
              </div>
            </template>
          </div>


          <button @click="scrollLeft" class="absolute left-0 top-1/2 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button @click="scrollRight" class="absolute right-0 top-1/2 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

      </div>
    </div>
    
  </section>


</body>