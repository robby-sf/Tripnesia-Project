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
    <style>
        .navbar {
            position: fixed;
            z-index: 10;
            width: 100%;
            top: 0;
            left: 0;
        }

        .content-container {
            margin-top: 120px;
        }

        .event-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.2s ease;
            display: flex;
            flex-direction: column;
            text-decoration: none; 
            color: inherit; 
        }


        .event-cards-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            justify-content: center; 
        }

        .event-card:hover {
            transform: translateY(-4px);
        }

        .event-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .event-details {
            padding: 16px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .event-date {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 6px;
        }

        .event-title {
            font-size: 1.1em;
            color: #333;
            margin: 0 0 10px;
            font-weight: bold;
            line-height: 1.3;
        }

        .event-description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Maksimal 3 baris */
            -webkit-box-orient: vertical;
            font-size: 0.875rem; /* text-sm */
            color: #4B5563; /* text-gray-600 */
            margin-top: 0.5rem;
            line-height: 1.4;
        }


        .event-meta {
            margin-top: auto;
            font-size: 0.9em;
            color: #555;
        }

        .event-meta i {
            margin-right: 6px;
            color: #888;
        }

        @media (min-width: 640px) {
             .event-cards-wrapper {
        grid-template-columns: repeat(2, 1fr); /* 2 kolom di layar kecil */
             }
        }

        @media (min-width: 1024px) {
            .event-cards-wrapper {
        grid-template-columns: repeat(4, 1fr); /* 4 kolom di layar besar */
    }
}
    </style>
</head>

<body class="h-full bg-gray-100">
    @if (!Request::is($excludeNavbar))
        <x-Navbar class="navbar" />
    @endif

    <!-- Main Content -->
   <div class="max-w-7xl mx-auto px-6 lg:px-12 py-12 content-container">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Daftar Event</h1>
    <p class="text-gray-600 text-lg mb-12">
        Yuk, intip event seru tahun 2025 ini!
    </p>


        <div class="event-cards-wrapper mt-6">
            @foreach ($events as $event)
                <a href="{{ route('events.show', $event->slug) }}" class="block event-card hover:shadow-xl transition-shadow duration-200">
                    <img src="{{ asset('storage/events/' . $event->image) }}" alt="{{ $event->title }}">
                    <div class="event-details">
                        <p class="event-date">
                            🗓️ {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                        </p>

                        <h3 class="event-title">{{ $event->title }}</h3>

                        <p class="event-meta">
                            🌍 {{ $event->location }}
                        </p>

                        <p class="event-description">
                            {{ \Illuminate\Support\Str::limit(strip_tags($event->description), 100, '...') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>
