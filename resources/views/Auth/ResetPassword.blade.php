<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link rel="icon" type="png" href="/Asset/Logo Tripnesia.PNG">
    @vite('resources/css/app.css')
    <title>Reset Password - Tripnesia</title>
</head>

<body class="bg-center bg-cover min-h-screen flex items-center justify-center p-4" style="background-image: url('/Asset/LoginBack.jpg');">
    <div class="absolute inset-0 bg-black/50 z-0"></div>

    <div class="relative z-10 bg-amber-50 rounded-lg shadow-2xl p-8 max-w-md w-full text-gray-800">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('storage/Asset/reset.png') }}" alt="Reset Password Illustration" class="size-40">
        </div>

        <h2 class="text-2xl font-bold mb-2 text-center text-gray-800">Reset Password Anda</h2>
        <p class="text-gray-600 mb-6 text-center text-sm">Atur password baru Anda di bawah ini.</p>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div>
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="contoh: nama@email.com"
                    required
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1C787F] focus:border-transparent text-gray-800 bg-[#EBDCC5] placeholder-gray-500 transition duration-200"
                >
                @error('email')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password Baru</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Masukkan password baru"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1C787F] focus:border-transparent text-gray-800 bg-[#EBDCC5] placeholder-gray-500 transition duration-200"
                >
                @error('password')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password Baru</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Konfirmasi password baru"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1C787F] focus:border-transparent text-gray-800 bg-[#EBDCC5] placeholder-gray-500 transition duration-200"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-[#1C787F] hover:bg-cyan-900 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-800"
            >
                Reset Password
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