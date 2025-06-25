<aside class="w-64 shrink-0 bg-[#0f172a] text-gray-300 flex flex-col min-h-screen justify-between">
    
    <div>
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="/admin/dashboard" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin') ? 'bg-[#1e293b] text-white' : '' }}">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                Dashboard
            </a>

            <a href="/admin/destination-data" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin/destination-data*') ? 'bg-[#1e293b] text-white' : '' }}">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                Destination
            </a>

            <a href="/admin/package" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin/package*') ? 'bg-[#1e293b] text-white' : '' }}">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8v-2a2 2 0 00-2-2h-4a2 2 0 00-2 2v2zM9 6h6v4H9V6z" />
                </svg>
                Package
            </a>

            <a href="/admin/event" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin/event*') ? 'bg-[#1e293b] text-white' : '' }}">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                Event
            </a>

            <a href="/admin/pesanan" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin/pesanan*') ? 'bg-[#1e293b] text-white' : '' }}">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                Order
            </a>

            <a href="/admin/userControl" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin/user*') ? 'bg-[#1e293b] text-white' : '' }}">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                    <circle cx="8.5" cy="7.5" r="4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
                User
            </a>

            <a href="/register/admin" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin/add-admin*') ? 'bg-[#1e293b] text-white' : '' }}">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                    <circle cx="8.5" cy="7.5" r="4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 8v6m-3-3h6" />
                </svg>
                Add Admin
            </a>

            <a href="/admin/settings" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-[#1e293b] hover:text-white {{ request()->is('admin/setting*') ? 'bg-[#1e293b] text-white' : '' }}">
                <!-- Ikon Setting -->
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                Settings
            </a>
        </nav>
    </div>

    <div class="px-4 py-6">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="w-full flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-red-500 hover:text-white">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                Logout
            </button>
        </form>
    </div>

</aside>
