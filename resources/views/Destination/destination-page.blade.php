<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="png" href="/Asset/icon Web.png">
    @vite('resources/css/app.css')
    <title>Tripnesia</title>

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    <x-Navbar></x-Navbar>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-lg mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $destination->nama }}</h1>

        <img src="{{ asset('storage/Asset/' . $destination->gambar) }}" alt="{{ $destination->nama }}"
            class="w-full h-64 object-cover rounded-lg mb-6" />

        <p class="text-gray-700 mb-4">
            {{ $destination->deskripsi }}
        </p>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Informasi</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li><strong>Alamat:</strong> {{ $destination->alamat }}</li>
                <li><strong>Jam Buka:</strong> {{ $destination->jam_buka }} - {{ $destination->jam_tutup }} WIB</li>
                <li><strong>Tiket Masuk:</strong> Gratis</li>
            </ul>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Lokasi</h2>
            <iframe src="{{ $destination->maps }}" width="100%" height="300" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="border-t pt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Ulasan Pengunjung</h2>

            <div class="max-h-80 overflow-y-auto space-y-4 mb-8 pr-2">
                @forelse ($destination->reviews as $review)
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <p class="font-semibold text-gray-800">{{ $review->user->nama }}</p>
                            <p class="text-sm text-gray-400">{{ $review->created_at->format('d M Y') }}</p>
                        </div>
                        <p class="text-yellow-500 text-sm">
                            {{ str_repeat('★', $review->rating) }}
                            {{ str_repeat('☆', 5 - $review->rating) }}
                        </p>
                        <p class="text-gray-700 mt-1">{{ $review->comment }}</p>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="absolute top-2 right-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus ulasan ini?')"
                                    class="text-red-500 hover:text-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada ulasan untuk destinasi ini.</p>
                @endforelse
            </div>

            @if(Auth::check())
                <div class="bg-white p-4 rounded-lg shadow mt-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Tulis Ulasan Anda</h3>

                    <form method="POST" action="{{ route('reviews.store') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">

                        <!-- Rating Bintang -->
                        <div x-data="{ rating: 0 }" class="flex items-center space-x-1">
                            <input type="hidden" name="rating" x-model="rating">
                            <template x-for="star in 5" :key="star">
                                <svg @click="rating = star"
                                    :class="star <= rating ? 'text-yellow-400' : 'text-gray-300'"
                                    class="w-8 h-8 cursor-pointer transition duration-150"
                                    fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.947a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.285 3.947c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.176 0l-3.36 2.44c-.784.57-1.838-.197-1.539-1.118l1.285-3.947a1 1 0 00-.364-1.118L2.075 9.374c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.947z" />
                                </svg>
                            </template>
                        </div>

                        <!-- Komentar -->
                        <textarea name="comment" rows="4" placeholder="Tulis komentar Anda..."
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required></textarea>

                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>
            @else
                <p class="mt-4 text-gray-600">Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk memberikan ulasan.</p>
            @endif
        </div>
    </div>

</body>

</html>
