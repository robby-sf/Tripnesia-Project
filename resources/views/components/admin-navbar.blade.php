<header class="sticky top-0 bg-white border-b border-gray-200 ">
    <div class="h-16 flex items-center justify-between px-6">
        
        <!-- Slot untuk Judul Halaman -->
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $slot ?? 'Page Title' }}</h1>
            <!-- Ganti 'Page Title' dengan variabel default atau biarkan kosong -->
        </div>

        <!-- Ikon dan Profil Pengguna -->
        <div class="flex items-center space-x-5">
            
            <div class="text-gray-800 font-semibold">
                {{ Auth::guard('admin')->user()->nama ?? 'User Name' }}
            </div>
            
            <!-- Dropdown Profil Pengguna (Menggunakan Alpine.js dari kode Anda) -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" type="button" class="flex items-center rounded-full transition">
                    <img class="h-9 w-9 rounded-full object-cover" src="/storage/Asset/{{ Auth::guard('admin')->user()->profile_picture ?? 'profilekosong.jpg' }}" alt="Foto Profil">
                </button>

                <!-- Menu Dropdown -->
                <div 
                    x-cloak
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    @click.outside="open = false"
                    class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100 z-50"
                >
                    <!-- Info Pengguna -->
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-semibold text-gray-800"></p>
                        <p class="text-xs text-gray-500 truncate">{{ Auth::guard('admin')->user()->email ?? 'guest@gmail.com' }}</p>
                    </div>

                    <div class="py-1">
                        <a href="{{ route('admin.settings') }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg class="w-4 h-4 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Settings
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <svg class="w-4 h-4 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Sign out
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>