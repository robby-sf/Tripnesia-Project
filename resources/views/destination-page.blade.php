<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="png" href="/Asset/icon Web.png">
    @vite('resources/css/app.css')
    <title>Tripnesia</title>

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    <x-Navbar></x-Navbar>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-lg mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $destination->nama }}</h1>

        <img src="{{ asset('storage/' . $destination->gambar) }}" alt="{{ $destination->nama }}"
            class="w-full h-64 object-cover rounded-lg mb-6" />

        <p class="text-gray-700 mb-4">
            {{ $destination->deskripsi }}
        </p>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Informasi</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li><strong>Alamat:</strong> {{ $destination->alamat }}</li>
                <li><strong>Jam Buka:</strong> {{ $destination->jam_buka }} - {{ $destination->jam_tutup }} WIB</li>
                <li><strong>Tiket Masuk:</strong> Gratis</li>
            </ul>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Lokasi</h2>
            <iframe src="{{ $destination->maps }}" width="100%" height="300" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
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
