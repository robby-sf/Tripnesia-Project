<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

  <!-- Hero Section -->
  <section class="bg-blue-600 text-white py-16 text-center">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl font-bold mb-4">Tentang Kami</h1>
      <p class="text-lg max-w-2xl mx-auto">
        Kami adalah tim yang berkomitmen untuk mempermudah perjalanan wisata Anda dengan menyediakan informasi destinasi terbaik secara akurat dan terpercaya.
      </p>
    </div>
  </section>

  <!-- Visi dan Misi -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold mb-6 text-center">Visi & Misi</h2>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-xl shadow">
          <h3 class="font-semibold text-lg mb-2">Visi</h3>
          <p>Membantu wisatawan menemukan dan merasakan pengalaman terbaik di berbagai destinasi Indonesia.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
          <h3 class="font-semibold text-lg mb-2">Misi</h3>
          <ul class="list-disc pl-5 space-y-2">
            <li>Menyediakan informasi destinasi secara lengkap dan aktual.</li>
            <li>Memberdayakan UMKM dan pelaku wisata lokal.</li>
            <li>Menggunakan teknologi untuk memudahkan perjalanan wisata.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Tim Kami -->
  <section class="py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold mb-10 text-center">Tim Kami</h2>
      <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">
        <!-- Anggota Tim -->
        <div class="text-center">
          <img src="https://via.placeholder.com/150" alt="Nama" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-lg font-semibold">Rina Setiawan</h3>
          <p class="text-sm text-gray-500">Project Manager</p>
        </div>
        <div class="text-center">
          <img src="https://via.placeholder.com/150" alt="Nama" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-lg font-semibold">Dimas Pratama</h3>
          <p class="text-sm text-gray-500">Web Developer</p>
        </div>
        <div class="text-center">
          <img src="https://via.placeholder.com/150" alt="Nama" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-lg font-semibold">Siti Aisyah</h3>
          <p class="text-sm text-gray-500">Content Creator</p>
        </div>
        <!-- Tambahkan lebih banyak jika perlu -->
      </div>
    </div>
  </section>

  <!-- Kontak -->
  <section class="bg-blue-50 py-16">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-2xl font-bold mb-6">Ingin Bekerja Sama?</h2>
      <p class="mb-6 max-w-xl mx-auto">Kami terbuka untuk kolaborasi dengan komunitas, pelaku usaha, dan pemerintah daerah. Hubungi kami dan mari bangun pariwisata Indonesia bersama!</p>
      <a href="/kontak" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        Hubungi Kami
      </a>
    </div>
  </section>

</body>
</html>
