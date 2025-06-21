@php use Illuminate\Support\Str; @endphp

@php
    $excludeNavbar = ['login', 'register', 'dashboard*'];
@endphp

<!doctype html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tripnesia - Daftar Event</title>
    @vite('resources/css/app.css')
    <style>[x-cloak] { display: none; }</style>
    <link rel="icon" type="png" href="/Asset/icon Web.png">
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

<body class="bg-gray-100">
    @if (!Request::is($excludeNavbar))
        <x-Navbar class="fixed top-0 left-0 right-0 z-10" />
    @endif

    <div class="w-full px-4 sm:px-6 lg:px-12 pt-20 pb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">Daftar Event</h1>
        <p class="text-gray-600 text-base sm:text-lg mb-8">Yuk, intip event seru tahun 2025 ini!</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-center">
            @foreach ($events as $event)
                <a href="{{ route('events.show', $event->slug) }}"
                   class="bg-white rounded-xl shadow hover:shadow-md transition-all duration-200 overflow-hidden flex flex-col">
                    
                    <img src="{{ asset('storage/events/' . $event->image) }}"
                         alt="{{ $event->title }}"
                         class="w-full h-48 object-cover" />

                    <div class="p-4 flex flex-col flex-grow">
                        <p class="text-sm text-gray-500 mb-1">
                            📅 {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                        </p>

                        <h3 class="text-lg font-semibold text-gray-800 leading-snug mb-1">
                            {{ $event->title }}
                        </h3>

                        <p class="text-sm text-gray-500 mb-2">
                            🌍 {{ $event->location }}
                        </p>

                        <p class="text-sm text-gray-600 line-clamp-2 mt-auto">
                            {{ \Illuminate\Support\Str::limit(strip_tags($event->description), 100, '...') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>
