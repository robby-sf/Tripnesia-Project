<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - Tripnesia</title>
    <link rel="icon" type="png" href="/Asset/icon Web.png">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }

        [x-cloak] {
            display: none;
        }
        /* Custom scrollbar for webkit browsers */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #1f2937; /* bg-gray-800 */
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #4b5563; /* bg-gray-600 */
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #6b7280; /* bg-gray-500 */
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">
        <main class="flex-1 p-6 md:p-10 custom-scrollbar overflow-y-auto">
            <div class="bg-white p-8 md:p-12 rounded-lg shadow-sm w-full max-w-4xl mx-auto" x-data="{ show: false }">
                <h1 class="text-3xl font-light text-gray-800 tracking-wider mb-10 border-b pb-4">ACCOUNT SETTINGS</h1>

                <form action="{{ route('admin.update') }}" method="POST" class="space-y-8" enctype="multipart/form-data">
                    @csrf

                    <div class="flex items-center space-x-6">
                        <img src="{{ asset('storage/Asset/' . ($admin->profile_picture ?? 'profilekosong.jpg')) }}" alt="Profile Picture" class="size-24 rounded-full object-cover ring-2 ring-offset-2 ring-gray-200">
                        <div class="flex flex-col space-y-3">
                            <div>
                                <label for="profile_picture" class="cursor-pointer rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                                    Change Photo
                                </label>
                                <input id="profile_picture" name="profile_picture" type="file" class="sr-only">
                            </div>
                            <button type="submit" name="hapus_foto" value="1" class="text-left text-sm font-semibold text-red-600 hover:text-red-400 transition-colors duration-200">
                                Remove Photo
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-600 mb-1">Username</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama', $admin->nama ?? '') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-600 mb-1">E-mail</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $admin->email ?? '') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
                        </div>
                        
                        <div>
                            <label for="nomor_telp" class="block text-sm font-medium text-gray-600 mb-1">Phone Number</label>
                            <input type="tel" id="nomor_telp" name="nomor_telp" value="{{ old('nomor_telp', $admin->nomor_telp ?? '') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-600 mb-1">Date of Birth</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $admin->tanggal_lahir ?? '') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
                        </div>

                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm font-medium text-gray-600 mb-1">Address</label>
                            <textarea id="alamat" name="alamat" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">{{ old('alamat', $admin->alamat ?? '') }}</textarea>
                        </div>

                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-600 mb-1">New Password</label>
                            <input :type="show ? 'text' : 'password'" id="password" name="password" placeholder="Leave blank to keep current password" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
                            <div class="absolute inset-y-0 right-0 top-6 pr-3 flex items-center cursor-pointer" @click="show = !show">
                                <svg x-show="!show" class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" /></svg>
                                <svg x-show="show" x-cloak class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.963 9.963 0 012.233-3.592m1.735-1.4A9.99 9.99 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.971 9.971 0 01-4.343 5.303M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" /></svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-6 pt-6 border-t mt-10">
                        <button type="submit" class="bg-amber-500 text-white font-semibold py-2.5 px-10 rounded-full hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors duration-300">
                            Save Changes
                        </button>
                        <a href="/admin" class="text-gray-600 font-medium py-2.5 px-10 rounded-full hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition-colors duration-300">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>