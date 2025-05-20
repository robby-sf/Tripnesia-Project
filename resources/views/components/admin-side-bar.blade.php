<div class="min-h-screen flex flex-col justify-between bg-[#1A2331]">
    <div class="lg:w-58 md:w-40 sm:w-34 space-y-3 transition-all duration-200 ease-in-out">
        <a href="/admin" class="{{ request()->is('admin') ? 'bg-[#263347]' : ''}} block p-3 m-3 text-white rounded-md hover:bg-[#263347]">Dashboard</a>
        <a href="/admin/data-wisata" class="{{ request()->is('admin/data-wisata') ? 'bg-[#263347]' : ''}} block p-3 m-3 text-white rounded-md hover:bg-[#263347]">Data Wisata</a>
        <a href="/admin/pesanan" class="{{ request()->is('admin/pesanan') ? 'bg-[#263347]' : ''}} block p-3 m-3 text-white rounded-md hover:bg-[#263347]">Pesanan</a>
        <a href="/admin/setting" class="{{ request()->is('setting') ? 'bg-[#263347]' : ''}} block p-3 m-3 text-white rounded-md hover:bg-[#263347]">Setting</a>
        
    </div>
    <div class="mb-4">
        <button class="p-3 rounded">
            Logout
        </button>
    </div>

</div>