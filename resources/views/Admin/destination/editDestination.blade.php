<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="png" href="/Asset/icon Web.png">
  @vite('resources/css/app.css')
  <title>Destination Edit</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-inter">
<form action="{{ route('update',$destination -> id) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-md space-y-6">
  @csrf
  @method('PUT')

  <h2 class="text-2xl font-bold text-gray-800">Tambah Destinasi Wisata</h2>

  <div>
    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Destinasi</label>
    <input type="text" id="nama" name="nama" class="mt-1 w-full p-2 rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-1" value="{{old('nama', $destination -> nama) }}" required>
  </div>

  <div>
    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 w-full p-2 rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-1"required> {{old('deskripsi', $destination -> deskripsi) }} </textarea>
  </div>

  <div>
    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
    <input type="file" 
    id="gambar" name="gambar" accept="image/*" class="mt-1 w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
    @if($destination->gambar)
  <div class="mt-2">
    <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
    <img src="{{ asset('storage/Asset/' . $destination->gambar) }}" alt="Gambar Saat Ini" class="w-48 rounded shadow">
  </div>
@endif
  </div>

  <div>
    <label for="maps" class="block text-sm font-medium text-gray-700">Embed Google Maps</label>
    <input type="text" id="maps" name="maps" class="mt-1 w-full p-2 rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-1" value="{{old('maps', $destination -> maps) }}">
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label for="jam_buka" class="block text-sm font-medium text-gray-700">Jam Buka</label>
      <input type="time" id="jam_buka" name="jam_buka" class="mt-1 w-full p-2 rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-1" value="{{old('jam_buka', $destination -> jam_buka) }}">
    </div>

    <div>
      <label for="jam_tutup" class="block text-sm font-medium text-gray-700">Jam Tutup</label>
      <input type="time" id="jam_tutup" name="jam_tutup" class="mt-1 w-full p-2 rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-1" value="{{old('jam_tutup', $destination -> jam_tutup) }}">
    </div>
  </div>

  <div>
    <label for="harga" class="block text-sm font-medium text-gray-700">Harga Tiket (Rp)</label>
    <input type="number" id="harga" name="harga" min="0" class="mt-1 w-full p-2 rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-1" value="{{old('harga', $destination -> harga) }}">
  </div>

  <div>
    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
    <textarea id="alamat" name="alamat" rows="2" class="mt-1 w-full p-2 rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-1">{{old('alamat', $destination -> alamat) }}</textarea>
  </div>

  <div class="pt-4">
    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
      Simpan Destinasi
    </button>
  </div>
</form>

    
</body>

</html>