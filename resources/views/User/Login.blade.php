<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <link rel="icon" type="png" href="/Asset/Logo Tripnesia.PNG">
  @vite('resources/css/app.css')
  <title>Login - Tripnesia</title>
</head>

<body class="bg-center bg-cover flex items-center h-screen justify-center" style="background-image: url('/Asset/LoginBack.jpg');">
    <div class="absolute inset-0 bg-black/50 z-0"></div>

    <form method="POST" action="{{ route('login') }}" class="relative z-10 w-full max-w-md px-4 sm:px-0">
        @csrf

        <div class="bg-amber-50 p-8 rounded-lg shadow-2xl w-full">
            <img src="/Asset/Logo Tripnesia.PNG" alt="Logo Tripnesia" class="w-20 mx-auto mb-4">

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-1">
                Selamat Datang!
            </h2>
            <p class="text-center text-gray-600 mb-6 text-sm">Login untuk melanjutkan ke Tripnesia</p>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email"
                       class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none bg-[#EBDCC5] transition duration-200"
                       type="email" name="email" required value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative" x-data="{ show: false }">
                    <input id="password"
                           :type="show ? 'text' : 'password'"
                           class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none bg-[#EBDCC5] transition duration-200 pr-10"
                           name="password" required autocomplete="current-password">

                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700">
                        <svg x-show="!show" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 
                                  9.963 7.178.07.207.07.432 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 
                                  0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg x-show="show" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 
                                  19.5c.993 0 1.953-.138 2.863-.395M6.228 
                                  6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 
                                  8.773 3.162 10.065 7.498a10.522 10.522 0 0 
                                  1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 
                                  3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 
                                  0a3 3 0 1 0-4.243-4.243m4.243 4.243-4.243-4.243" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-300 text-[#1C787F] focus:ring-[#1C787F]">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-800">
                        Remember me
                    </label>
                </div>
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500 hover:underline">
                        Forgot Password?
                    </a>
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-[#1C787F] text-white rounded-lg hover:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-800 font-semibold transition duration-200">
                Login
            </button>

            <p class="text-center text-sm text-gray-500 mt-6">
                Belum punya akun?
                <a href="{{ route('register.form') }}" class="font-medium text-blue-600 hover:text-blue-500 hover:underline">
                    Daftar di sini
                </a>
            </p>
        </div>
    </form>
</body>
</html>
