<!doctype html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="png" href="/Asset/icon Web.png">
    @vite('resources/css/app.css')
    <title>Edit Event - Tripnesia</title>

    <style>[x-cloak] { display: none; }</style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-inter h-full">
    <div class="flex flex-nowrap w-full min-h-screen"> {{-- Added min-h-screen for full height --}}
        <div class="sticky top-0 h-full"> {{-- Ensure sidebar takes full height --}}
            <div class="flex flex-col h-full">
                <x-admin-header></x-admin-header>
                <x-admin-side-bar class="w-72 flex-1"></x-admin-side-bar>
            </div>
        </div>

        <main class="flex flex-col flex-1"> {{-- flex-1 to make main content take remaining width --}}
            <x-admin-navbar class="bg-white shadow-sm w-full">Edit Event</x-admin-navbar> {{-- Changed bg-gray-100 to bg-white and added shadow --}}

            <div class="flex-1 p-6 bg-gray-100"> {{-- Ensure background color covers the area --}}
                <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md"> {{-- Centralized card layout --}}
                    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 border-b pb-4">Edit Event</h1> {{-- Larger, bolder title with a separator --}}

                    <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> {{-- Grid layout for better organization --}}
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('title', $event->title) }}">
                            </div>

                            <div>
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                                <input type="text" name="slug" id="slug" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('slug', $event->slug) }}">
                            </div>

                            <div class="md:col-span-2"> {{-- Description takes full width in grid --}}
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                <textarea name="description" id="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" rows="5">{{ old('description', $event->description) }}</textarea>
                            </div>

                            <div>
                                <label for="event_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Event</label>
                                <input type="date" name="event_date" id="event_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('event_date', $event->event_date) }}">
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                                <input type="text" name="location" id="location" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('location', $event->location) }}">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                            @if($event->image)
                                <img src="{{ asset('storage/events/' . $event->image) }}" alt="Current Event Image" class="w-48 h-auto object-cover rounded-md shadow-sm mb-4"> {{-- Styled image preview --}}
                            @endif
                            <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100"> {{-- Styled file input --}}
                        </div>

                        <div class="mt-8">
                            <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>