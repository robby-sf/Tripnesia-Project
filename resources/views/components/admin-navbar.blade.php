<nav class="bg-[#214162] relative" x-data="{open:false}">
    <div class="flex justify-between items-center p-3">
        <div class="flex justify-center items-center h-10 font-sans space-x-2">
            <button class="flex items-center justify-center rounded-md bg-[#214162] hover:bg-[#2b4968] p-2">
                <svg class="block size-6 fill-current text-white"  viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>

            <h1 style="font-family: roboto" class="font-semibold text-white text-xl">TRIPNESIA</h1>
        </div>

        <div class="flex items-center justify-between flex-wrap md:flex-nowrap gap-y-2 gap-x-4 md:gap-x-6 md:mr-4">

            <div class="flex items-center space-x-3 md:gap-x-2">
                <button type="button" class="text-white hover:bg-[#2b4968] rounded-full p-2 transition duration-200 ease-in-out">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/>
                </svg>
                </button>

                <button class="flex items-center justify-center rounded-md bg-[] hover:bg-[#2b4968] p-2 transition duration-200 ease-in-out">
                <svg viewBox="0 0 24 24" class=" w-6 h-6 fill-current text-white">
                    <path d="M4 6H20L12 13L4 6Z"/>
                    <path d="M4 8V18H20V8L12 15L4 8Z"/>
                </svg>
                </button>
            </div>

            <div class="relative">
                <button @click="open = !open" type="button" class="relative flex items-center rounded-full w-8 h-8 ring-gray-600 transition duration-200 ease-in-out hover:bg-gray-500">
                <img class="w-full h-full rounded-full object-cover" src="/Asset/profilekosong.jpg" alt="Foto Profil">
                </button>
                <div 
                x-cloak
                x-show="open"
                x-transition
                @click.outside="open = false"
                class="absolute right-0 mt-4 w-44 sm:w-48 bg-gray-200 rounded-md shadow-lg py-2 z-50"
                >
                <div class="flex items-center px-4 py-2">
                    <img src="/Asset/profilekosong.jpg" alt="Foto Profil" class="rounded-full size-8">
                    <div class="ml-3">
                    <div class="text-sm font-semibold text-gray-700">Robby</div>
                    <div class="text-xs text-gray-500">Robby@gmail.com</div>
                    </div>
                </div>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">Sign out</a>
                </div>
            </div>
        </div>


    </div>
</nav>
