<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tripnesia</title>
    @vite('resources/css/app.css')
    <style>
        .justify-text {
            text-align: justify;
        }

        .btn-purchase {
            background-color: #2d3748;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-align: center;
            display: inline-block;
            width: 100%;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-purchase:hover {
            background-color: #4a5568;
        }

        .content-container {
            margin-top: 100px;
        }
    </style>
    
  <style>[x-cloak] { display: none; }</style>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <script>
    $(function () {
        $("#search").autocomplete({
            source: '/autocomplete',
            minLength: 1
        });
    });
    </script>
</head>

<body>
    <!-- Navbar -->
    <x-Navbar></x-Navbar>

    <div class="container mx-auto py-8 content-container">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Our Travel Packages</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($packages as $package)
                <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                    <img src="{{ asset('asset/' . $package->image) }}" alt="{{ $package->name }}"
                        class="w-full h-48 object-cover">

                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $package->name }}</h2>
                        <p class="text-gray-600 mt-2 justify-text">{{ $package->description }}</p>

                        <div class="mt-4">
                            <span class="text-lg font-semibold text-gray-800">Rp
                                {{ number_format($package->price, 0, ',', '.') }}</span>
                        </div>

                        <!-- Tombol Lanjut Pembayaran -->
                        <a href="{{ route('checkout.show', $package->id) }}" class="btn-purchase">
                            Beli Sekarang
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
