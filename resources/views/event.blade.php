<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Daftar Event - Tripnesia</title>
</head>
<body class="bg-gray-100">

  <div class="container mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold mb-8 text-center">Daftar Event Tripnesia</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
        <div class="bg-white shadow-lg rounded-lg p-4">
          <h2 class="text-xl font-semibold mb-2">
            <a href="{{ route('events.show', $event->slug) }}" class="text-blue-600 hover:underline">
              {{ $event->title }}
            </a>
          </h2>
          <p class="text-gray-500 text-sm mb-2">{{ $event->event_date }} | {{ $event->location }}</p>
          <p class="text-gray-700">{{ Str::limit($event->description, 100) }}</p>
        </div>
    
    </div>
  </div>

</body>
</html>
