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

  <section class="w-full h-80 bg-cover bg-center" style="background-image: url('/Asset/Foto about.jpg');">
    <div class="bg-black/50 w-full h-80 flex items-center justify-center">
        <div class="bg-gray-900/30 w-full">
            <div class="justify-center p-5">
            <h1 class="text-white text-4xl lg:text-6xl font-bold text-cente r" style="font-family: 'Poppins', sans-serif;">In every hidden beauty lies an opportunity to explore. We're here to bridge the gap between dreams and journeys.</h1>
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

  <div class="w-full bg-[#ffffff] flex items-center justify-center pt-10" style="font-family: 'Poppins', sans-serif;">
      <div class="flex flex-col p-8 m-auto">
        <h1 class="text-center mt-5 font-semibold text-4xl mb-15">
          Meet Out Team
        </h1>
        <div class="flex flex-col sm:flex-row gap-4 mt-8">
          <div class="flex flex-col shadow-md p-4 items-center">
            <img src="{{ asset('Asset/profilekosong.jpg') }}" alt="" class="rounded-full size-60">
            <div class="flex flex-col p-4">
              <h1 class="text-xl font-medium"> Nama Nama Nama</h1>
              <h1 > Programmer</h1>
            </div>
          </div>

          <div class="flex flex-col shadow-md p-4 items-center">
            <img src="{{ asset('Asset/profilekosong.jpg') }}" alt="" class="rounded-full size-60">
            <div class="flex flex-col p-4">
              <h1 class="text-xl font-medium"> Nama Nama Nama</h1>
              <h1 > Programmer</h1>
            </div>
          </div>

          <div class="flex flex-col shadow-md p-4 items-center">
            <img src="{{ asset('Asset/profilekosong.jpg') }}" alt="" class="rounded-full size-60">
            <div class="flex flex-col p-4">
              <h1 class="text-xl font-medium"> Nama Nama Nama</h1>
              <h1 > Programmer</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>