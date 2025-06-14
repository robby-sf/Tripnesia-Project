@php
    use Illuminate\Support\Str;
@endphp

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Daftar Event - Tripnesia</title>
</head>
<body class="bg-gray-100">
 
 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach ($events as $event)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden relative">
      <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-40 object-cover">

      <!-- Date Badge -->
      <div class="absolute top-4 left-4 bg-white text-pink-600 rounded-md shadow px-2 py-1 text-center">
        <div class="text-xs font-bold uppercase"> {{ \Carbon\Carbon::parse($event->event_date)->format('M') }} </div>
        <div class="text-lg font-bold"> {{ \Carbon\Carbon::parse($event->event_date)->format('d') }} </div>
      </div>

      <div class="p-4">
        <div class="flex justify-between items-start">
          <h3 class="text-lg font-bold text-gray-800">
            <a href="{{ route('events.show', $event->slug) }}" class="hover:underline">
              {{ $event->title }}
            </a>
          </h3>
          <button class="text-pink-500 hover:text-pink-600">
            ❤️
          </button>
        </div>
        <p class="text-sm text-gray-500 mt-1">{{ $event->location }}</p>
      </div>
    </div>
  @endforeach
</div>
