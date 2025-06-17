<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="png" href="/Asset/icon Web.png">
  @vite('resources/css/app.css')
  <title>Tripnesia</title>

   <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        [x-cloak] { display: none !important; }
        /* Style untuk scrollbar yang lebih modern (opsional) */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
    </style>

</head>

<body class="">
    <div class="flex flex-nowrap">
        <div class="flex flex-col">
                <x-admin-header></x-admin-header>
                <x-admin-side-bar class="w-72 flex-1"></x-admin-side-bar>
            </div>
        <main class="flex-1">
            <x-admin-navbar>Dashboard</x-admin-navbar>
            <div class="flex-1 p-6 lg:p-8">
                <!-- Statistik Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Card User -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Users</p>
                            <p class="text-3xl font-bold text-gray-800">1,250</p>
                        </div>
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <!-- Card Destination -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Destinations</p>
                            <p class="text-3xl font-bold text-gray-800">86</p>
                        </div>
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                    </div>
                    <!-- Card Package -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Travel Packages</p>
                            <p class="text-3xl font-bold text-gray-800">42</p>
                        </div>
                        <div class="bg-amber-100 p-3 rounded-full">
                           <svg class="w-6 h-6 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        </div>
                    </div>
                    <!-- Card Sales -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Sales</p>
                            <p class="text-3xl font-bold text-gray-800">2,345</p>
                        </div>
                        <div class="bg-rose-100 p-3 rounded-full">
                           <svg class="w-6 h-6 text-rose-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm" x-data="revenueChart()">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Revenue</h3>
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" class="flex items-center text-sm text-gray-600 bg-gray-100 px-3 py-1 rounded-md hover:bg-gray-200">
                                    Last 30 Days
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg z-10">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Last 7 Days</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Last 30 Days</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Last 90 Days</a>
                                </div>
                            </div>
                        </div>
                        <canvas x-ref="chart"></canvas>
                    </div>

                    <!-- Recent Events -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Events</h3>
                        <div class="space-y-4">
                            <!-- Event Item -->
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 flex-shrink-0 flex flex-col items-center justify-center rounded-lg font-bold">
                                    <span class="text-sm">JUN</span>
                                    <span class="text-lg -mt-1">28</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Jazz Festival 2024</p>
                                    <p class="text-sm text-gray-500">Prambanan Temple, Yogyakarta</p>
                                </div>
                            </div>
                            <!-- Event Item -->
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 flex-shrink-0 flex flex-col items-center justify-center rounded-lg font-bold">
                                    <span class="text-sm">JUL</span>
                                    <span class="text-lg -mt-1">05</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Bali Arts Festival</p>
                                    <p class="text-sm text-gray-500">Art Center, Denpasar</p>
                                </div>
                            </div>
                            <!-- Event Item -->
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-amber-100 text-amber-600 flex-shrink-0 flex flex-col items-center justify-center rounded-lg font-bold">
                                    <span class="text-sm">JUL</span>
                                    <span class="text-lg -mt-1">12</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Borobudur Marathon</p>
                                    <p class="text-sm text-gray-500">Borobudur, Magelang</p>
                                </div>
                            </div>
                             <!-- Event Item -->
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-rose-100 text-rose-600 flex-shrink-0 flex flex-col items-center justify-center rounded-lg font-bold">
                                    <span class="text-sm">AUG</span>
                                    <span class="text-lg -mt-1">17</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Independence Day Carnival</p>
                                    <p class="text-sm text-gray-500">National Monument, Jakarta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        function revenueChart() {
            return {
                init() {
                    const ctx = this.$refs.chart.getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'Revenue (in millions)',
                                data: [12, 19, 3, 5, 2, 3, 7, 8, 10, 15, 12, 18],
                                backgroundColor: 'rgba(99, 102, 241, 0.2)',
                                borderColor: 'rgba(99, 102, 241, 1)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.4
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value, index, values) {
                                            return 'Rp' + value + ' Jt';
                                        }
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                }
            }
        }
    </script>


</body>