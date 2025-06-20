<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - Nama Website Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Custom styles for the dark header color to match the image */
        .header-bg {
            background-color: #212F3D; /* Adjust this color to perfectly match your image's header */
        }
        .login-button {
            background-color: #F5B041; /* Adjust this yellow to match your image's login button */
        }
        .login-button:hover {
            background-color: #E69D31; /* Darker yellow on hover */
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <header class="header-bg text-white shadow-md">
        <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <img src="https://via.placeholder.com/30x30/28B463/FFFFFF?text=L" alt="Logo" class="rounded-full">
                <a href="#" class="text-xl font-bold">YourSite</a>
            </div>

            <div class="flex-grow max-w-md mx-4">
                <div class="relative">
                    <input type="text" placeholder="Search" class="w-full pl-10 pr-4 py-2 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500" value="Destination/Event Query">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </div>

            <ul class="hidden md:flex space-x-6 text-sm">
                <li><a href="#" class="hover:text-gray-300">Home</a></li>
                <li><a href="#" class="hover:text-gray-300">Destination</a></li>
                <li><a href="#" class="hover:text-gray-300">Package</a></li>
                <li><a href="#" class="hover:text-gray-300">Event</a></li>
                <li><a href="#" class="hover:text-gray-300">About</a></li>
            </ul>

            <a href="#" class="login-button text-gray-800 font-semibold py-2 px-6 rounded-full text-sm ml-4">Login</a>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Hasil Pencarian untuk "Destination/Event Query"</h1>

        <div class="flex flex-col md:flex-row gap-8">
            <aside class="md:w-1/4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Filter Pencarian</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="font-medium text-gray-700 mb-2">Kategori</h3>
                        <div class="space-y-2 text-sm">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-gray-600">Wisata Alam</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-gray-600">Budaya & Sejarah</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-gray-600">Petualangan</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-gray-600">Kuliner</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-gray-600">Event Festival</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-700 mb-2">Lokasi</h3>
                        <input type="text" placeholder="e.g., Bali, Raja Ampat" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-700 mb-2">Rating</h3>
                        <div class="space-y-2 text-sm">
                            <label class="flex items-center">
                                <input type="radio" name="rating" class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-600">5 Bintang</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="rating" class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-600">4 Bintang ke Atas</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="rating" class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-600">3 Bintang ke Atas</span>
                            </label>
                        </div>
                    </div>

                    <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 mt-4">Terapkan Filter</button>
                </div>
            </aside>

            <section class="md:w-3/4">
                <div class="flex justify-end mb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="bg-white py-2 px-4 rounded-md shadow-sm border border-gray-300 flex items-center space-x-2 text-gray-700 hover:bg-gray-50">
                        <span>Urutkan Berdasarkan: Terbaru</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute mt-12 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Terbaru</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Popularitas</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Harga (Terendah)</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Harga (Tertinggi)</a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/400x250/3498DB/FFFFFF?text=Raja+Ampat" alt="Raja Ampat" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Keindahan Bawah Laut Raja Ampat</h3>
                            <p class="text-gray-600 text-sm mb-3">Papua Barat, Indonesia</p>
                            <div class="flex items-center mb-3">
                                <span class="text-yellow-500">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                                <span class="ml-2 text-gray-600 text-sm">(4.5/5)</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-4 line-clamp-3">Temukan surga tersembunyi dengan keanekaragaman hayati laut yang menakjubkan di Raja Ampat.</p>
                            <a href="#" class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Lihat Detail</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/400x250/9B59B6/FFFFFF?text=Festival+Budaya" alt="Festival Budaya" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Festival Budaya Nusantara 2025</h3>
                            <p class="text-gray-600 text-sm mb-3">Jakarta, Indonesia</p>
                            <div class="flex items-center mb-3">
                                <span class="text-gray-600 text-sm">Tanggal: 15-20 Agustus 2025</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-4 line-clamp-3">Saksikan ragam seni dan budaya dari seluruh penjuru Indonesia dalam festival tahunan ini.</p>
                            <a href="#" class="inline-block bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition duration-300">Info Selengkapnya</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/400x250/27AE60/FFFFFF?text=Gunung+Bromo" alt="Gunung Bromo" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Pendakian Eksotis Gunung Bromo</h3>
                            <p class="text-gray-600 text-sm mb-3">Jawa Timur, Indonesia</p>
                            <div class="flex items-center mb-3">
                                <span class="text-yellow-500">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                <span class="ml-2 text-gray-600 text-sm">(5/5)</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-4 line-clamp-3">Rasakan pengalaman mendaki gunung berapi aktif dengan pemandangan sunrise yang memukau.</p>
                            <a href="#" class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Lihat Detail</a>
                        </div>
                    </div>

                     <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/400x250/E67E22/FFFFFF?text=Danau+Toba" alt="Danau Toba" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Pesona Danau Toba & Pulau Samosir</h3>
                            <p class="text-gray-600 text-sm mb-3">Sumatera Utara, Indonesia</p>
                            <div class="flex items-center mb-3">
                                <span class="text-yellow-500">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                                <span class="ml-2 text-gray-600 text-sm">(4.8/5)</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-4 line-clamp-3">Nikmati keindahan danau vulkanik terbesar di dunia dengan budaya Batak yang kental.</p>
                            <a href="#" class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Lihat Detail</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/400x250/8E44AD/FFFFFF?text=Jazz+Festival" alt="Jazz Festival" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Java Jazz Festival 2026</h3>
                            <p class="text-gray-600 text-sm mb-3">Jakarta, Indonesia</p>
                            <div class="flex items-center mb-3">
                                <span class="text-gray-600 text-sm">Tanggal: 2-4 Maret 2026</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-4 line-clamp-3">Saksikan penampilan musisi jazz internasional dan nasional di salah satu festival terbesar.</p>
                            <a href="#" class="inline-block bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition duration-300">Info Selengkapnya</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/400x250/F1C40F/FFFFFF?text=Tari+Kecak" alt="Tari Kecak" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Pertunjukan Tari Kecak Uluwatu</h3>
                            <p class="text-gray-600 text-sm mb-3">Bali, Indonesia</p>
                            <div class="flex items-center mb-3">
                                <span class="text-gray-600 text-sm">Setiap Hari Sunset</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-4 line-clamp-3">Nikmati pertunjukan tari kecak yang ikonik dengan latar belakang sunset di Pura Uluwatu.</p>
                            <a href="#" class="inline-block bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition duration-300">Info Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-8">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">10</a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </section>
        </div>
    </main>

    <footer class="header-bg text-white py-6 mt-12">
        <div class="container mx-auto px-4 text-center text-sm">
            <p>&copy; 2025 YourSite. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-2">
                <a href="#" class="hover:text-gray-300">Privacy Policy</a>
                <a href="#" class="hover:text-gray-300">Terms of Service</a>
                <a href="#" class="hover:text-gray-300">Contact Us</a>
            </div>
        </div>
    </footer>

</body>
</html>