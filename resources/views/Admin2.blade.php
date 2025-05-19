<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin - Pariwisata</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white flex flex-col">
      <div class="p-6 text-2xl font-bold border-b border-blue-800">Admin Panel</div>
      <nav class="flex-1 p-4">
        <ul class="space-y-2">
          <li><a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">Dashboard</a></li>
          <li><a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">Data Wisata</a></li>
          <li><a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">Pengunjung</a></li>
          <li><a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">Pesanan</a></li>
          <li><a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">Pengaturan</a></li>
        </ul>
      </nav>
      <div class="p-4 border-t border-blue-800">
        <button class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded">Logout</button>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold">Dashboard</h1>
        <div class="flex items-center space-x-4">
          <span class="text-gray-600">Admin</span>
          <img src="https://i.pravatar.cc/40" alt="Admin" class="rounded-full w-10 h-10" />
        </div>
      </header>

      <!-- Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
          <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-sm text-gray-500">Jumlah Tempat Wisata</h2>
            <p class="text-2xl font-bold">24</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-sm text-gray-500">Total Pengunjung</h2>
            <p class="text-2xl font-bold">1.420</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-sm text-gray-500">Pesanan Hari Ini</h2>
            <p class="text-2xl font-bold">35</p>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h3>
          <ul class="space-y-2">
            <li>✔️ Pesanan dari <strong>Budi</strong> telah dikonfirmasi</li>
            <li>📍 Tempat wisata baru <strong>Curug Pelangi</strong> ditambahkan</li>
            <li>👥 Pengguna <strong>Siti</strong> mendaftar sebagai pengunjung</li>
          </ul>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
