<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" type="image/png" href="/Asset/Logo Tripnesia.PNG">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  
  <style>[x-cloak] { display: none !important; }</style>

  <title>Tambah Admin - Tripnesia</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4 font-sans">
    
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-2xl">
        <img src="/Asset/Logo Tripnesia.PNG" alt="Logo Tripnesia" class="w-20 mx-auto mb-4">

        <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">
            Tambahkan Admin Baru
        </h2>

        <form action="{{ route('adminRegister') }}" method="POST" x-data="{ showPassword: false }">
            @csrf
            
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="nama" type="text" name="nama" required value="{{ old('nama') }}"
                       class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2  focus:ring-black focus:border-white focus:outline-none">
                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" required value="{{ old('email') }}"
                           class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2  focus:ring-black focus:border-white focus:outline-none">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="nomor_telp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input id="nomor_telp" type="tel" name="nomor_telp" required value="{{ old('nomor_telp') }}"
                           class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2  focus:ring-black focus:border-white focus:outline-none" placeholder="08123456789">
                    @error('nomor_telp')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" required
                          class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2  focus:ring-black focus:border-white focus:outline-none">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input id="tanggal_lahir" type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}"
                       class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2  focus:ring-black focus:border-white focus:outline-none">
                @error('tanggal_lahir')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative mt-1">
                        <input id="password" :type="showPassword ? 'text' : 'password'" name="password" required
                               class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2  focus:ring-black focus:border-white focus:outline-none pr-10">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" @click="showPassword = !showPassword">
                             <svg x-show="!showPassword" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243L6.228 6.228" />
                            </svg>
                            <svg x-show="showPassword" x-cloak class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <div class="relative mt-1">
                        <input id="password_confirmation" :type="showPassword ? 'text' : 'password'" name="password_confirmation" required
                               class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-black focus:border-white focus:outline-none pr-10">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" @click="showPassword = !showPassword">
                             <svg x-show="!showPassword" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243L6.228 6.228" />
                            </svg>
                            <svg x-show="showPassword" x-cloak class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="w-full py-3 rounded-lg font-semibold text-white bg-[#0F172A] hover:bg-[#1E293B] focus:outline-none transition duration-300 ease-in-out">
                Daftar
            </button>
        </form>
    </div>

</body>
</html>