<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link rel="icon" type="png" href="/Asset/Logo Tripnesia.PNG">
    @vite('resources/css/app.css')
    <title>Lupa Password - Tripnesia</title>
</head>

<body class="bg-center bg-cover min-h-screen flex items-center justify-center p-4" style="background-image: url('/Asset/LoginBack.jpg');">
    <div class="absolute inset-0 bg-black/50 z-0"></div>

    <div class="relative z-10 bg-amber-50 rounded-lg shadow-2xl p-8 max-w-md w-full text-gray-800">
        <div class="flex justify-center mb-2">
            {{-- Using the Tripnesia logo for consistency --}}
            <img src="/Asset/Logo Tripnesia.PNG" alt="Tripnesia Logo" class="w-20">
        </div>

        <h2 class="text-2xl font-bold mb-2 text-center text-gray-800">Lupa Password Anda?</h2>
        <p class="text-gray-600 mb-6 text-center text-sm">Masukkan email Anda agar kami dapat mengirimkan tautan reset password.</p>

        @if (session('status'))
            <p class="bg-green-300 text-green-700 p-3 rounded-md mb-4 text-center text-sm">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="contoh: nama@email.com"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1C787F] focus:border-transparent text-gray-800 bg-[#EBDCC5] placeholder-gray-500 transition duration-200"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-[#1C787F] hover:bg-cyan-900 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-800"
            >
                Kirim Email Reset Password
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('login') }}" class="text-[#1C787F] hover:text-cyan-700 text-sm font-medium transition duration-200 hover:underline">
                Kembali ke Login
            </a>
        </div>
    </div>
</body>
</html>