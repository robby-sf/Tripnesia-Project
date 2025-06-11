<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>{{ $event->title }} - Tripnesia</title>
</head>
<body class="bg-gray-50">

  <div class="max-w-4xl mx-auto py-10 px-6">
    <a href="{{ route('events.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">&larr; Kembali ke daftar event</a>

    <div class="bg-white rounded-lg shadow-lg p-6">
      <h1 class="text-3xl font-bold mb-2">{{ $event->title }}</h1>
      <p class="text-gray-500 mb-4">{{ $event->event_date }} | {{ $event->location }}</p>
      <p class="text-gray-700">{{ $event->description }}</p>
    </div>
  </div>

</body>
</html>
