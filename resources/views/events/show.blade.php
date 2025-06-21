<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event - {{ $event->title }}</title>
    <link rel="icon" type="png" href="/Asset/icon Web.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="min-h-screen font-sans flex items-center justify-center py-10 px-4 bg-gradient-to-b from-[#f1ebe3] via-[#dae9e8] to-[#ccd7e7]">
    <div class="bg-white max-w-4xl w-full rounded-xl shadow-2xl p-6 sm:p-10 border border-gray-200">
        
        <!-- Header -->
        <div class="flex items-center mb-8">
            <button onclick="history.back()" class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shadow hover:bg-indigo-200 mr-4">
                <i class="fas fa-arrow-left text-lg"></i>
            </button>
            <h1 class="text-2xl sm:text-3xl font-semibold text-gray-800 text-center w-full">Detail Event</h1>
        </div>

        <!-- Content -->
        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
            
            <!-- Image -->
            <div class="w-full md:w-[45%] rounded-md overflow-hidden shadow">
                <img src="{{ asset('storage/events/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-64 object-cover">
            </div>

            <!-- Details -->
            <div class="w-full md:w-[55%]">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $event->title }}</h2>

                <p class="text-gray-700 text-justify text-sm leading-relaxed mb-4">
                    {{ $event->description }}
                </p>

                <!-- Metadata -->
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt text-indigo-500 mr-2"></i>
                        <span class="font-medium text-indigo-700">
                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}
                        </span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-purple-500 mr-2"></i>
                        <span class="font-medium text-purple-700">{{ $event->location }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
