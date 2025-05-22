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

        .btn-purchase {
            background-color: #2d3748;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-purchase:hover {
            background-color: #4a5568;
        }

        .navbar {
            position: relative;
            z-index: 10;
        }

        .content-container {
            margin-top: 85px;
        }
    </style>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <x-Navbar class="navbar"></x-Navbar>

    <div class="container mx-auto py-8 content-container">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Our Travel Packages</h1>

        <!-- Grid daftar paket -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Paket 1 -->
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <img src="{{ asset('asset/BorobudurPackage.jpg') }}" alt="Borobudur" class="w-full h-48 object-cover">

                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Borobudur Temple Tour</h2>
                    <p class="text-gray-600 mt-2">Explore the magnificent Borobudur Temple, a UNESCO World Heritage
                        site, with this 2-day cultural tour including a visit to nearby temples and local attractions.
                    </p>

                    <div class="mt-4">
                        <span class="text-lg font-semibold text-gray-800">Rp 1,500,000</span>
                    </div>

                    <!-- Tombol Lanjut Pembayaran -->
                    <a href="#"
                        class="mt-6 inline-block text-white px-6 py-3 rounded-md text-center w-full btn-purchase">
                        Beli Sekarang
                    </a>

                </div>
            </div>

            <!-- Paket 2 -->
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <img src="{{ asset('asset/RajaAmpatPackage.jpg') }}" alt="Raja Ampat" class="w-full h-48 object-cover">

                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Raja Ampat Adventure</h2>
                    <p class="text-gray-600 mt-2">Experience the stunning underwater world of Raja Ampat, a paradise for
                        divers. This 5-day tour includes island hopping and snorkeling in crystal-clear waters.</p>

                    <div class="mt-4">
                        <span class="text-lg font-semibold text-gray-800">Rp 5,000,000</span>
                    </div>

                    <!-- Tombol Lanjut Pembayaran -->
                    <a href="#"
                        class="mt-6 inline-block text-white px-6 py-3 rounded-md text-center w-full btn-purchase">
                        Beli Sekarang
                    </a>

                </div>
            </div>

            <!-- Paket 3 -->
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <img src="{{ asset('asset/BromoPackage.jpg') }}" alt="Bromo" class="w-full h-48 object-cover">

                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Mount Bromo Sunrise Tour</h2>
                    <p class="text-gray-600 mt-2">Join a 3-day tour to explore the breathtaking views of Mount Bromo,
                        including a sunrise trek, jeep ride across the volcanic sand, and visit to nearby crater.</p>

                    <div class="mt-4">
                        <span class="text-lg font-semibold text-gray-800">Rp 2,000,000</span>
                    </div>

                    <!-- Tombol Lanjut Pembayaran -->
                    <a href="#"
                        class="mt-6 inline-block text-white px-6 py-3 rounded-md text-center w-full btn-purchase">
                        Beli Sekarang
                    </a>

                </div>
            </div>

        </div>
    </div>

</body>

</html>
