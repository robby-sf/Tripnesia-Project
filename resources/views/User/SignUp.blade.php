
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" type="png" href="/Asset/Logo Tripnesia.PNG">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <style>[x-cloak] { display: none; }</style>
  <title>Tripnesia</title>
</head>

<body 
class=" bg-center bg-cover flex items-center h-screen justify-center" 
style="background-image: url('/Asset/LoginBack.jpg');">
    <div class="absolute inset-0 bg-black/50 z-0"></div>

    <div class="bg-amber-50 p-8 rounded-lg shadow-lg w-full max-w-md z-10">
        <img src="/Asset/Logo Tripnesia.PNG" alt="Logo Tripnesia" class="w-20 mx-auto mb-2">

        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">
            Buat Akun Tripnesia
        </h2>

    
        <form action="{{ route('register') }}" method="POST" x-data="{show:false}">
            @csrf
                <div class="mb-4 flex gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-600" >Nama Depan</label>
                        <input class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                        style="background-color: #EBDCC5;" type="text" name="nama_depan"  required value="{{ old('nama_depan') }}">
                        @error('nama_depan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-600" >Nama Belakang</label>
                        <input class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                        style="background-color: #EBDCC5;" type="text" name="nama_belakang"  required value="{{ old('nama_belakang') }}">
                        @error('nama_belakang')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600" >Email</label>
                        <input class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                        style="background-color: #EBDCC5;"type="email" name="email"  required value="{{ old('email') }}">
                        @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-4 relative">
                    <label class="block text-sm font-medium text-gray-600">Password</label>
                    <input :type="show ? 'text' : 'password'"
                        class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                        style="background-color: #EBDCC5;" name="password" required>

                    <div class="absolute inset-y-0 right-0 top-7 pr-3 flex items-center cursor-pointer" @click="show = !show">
                        <svg x-show="!show" class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12c2.5 2 11.5 2 14 0" />
                            <line x1="6" y1="14" x2="5" y2="16" />
                            <line x1="8" y1="14.5" x2="7.5" y2="16.5" />
                            <line x1="10" y1="15" x2="10" y2="17" />
                            <line x1="12" y1="15" x2="12.5" y2="17" />
                            <line x1="14" y1="14.5" x2="15" y2="16.5" />
                            <line x1="16" y1="14" x2="17" y2="16" />
                        </svg>
                        <svg x-show="show" x-cloak class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5C21.27 8.11 17 4.5 12 4.5z" />
                            <circle cx="12" cy="12" r="3" fill="currentColor" />
                        </svg>
                    </div>

                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mb-4 relative">
                    <label class="block text-sm font-medium text-gray-600">Confirmation Password</label>
                    <input :type="show ? 'text' : 'confimation_password'"
                        class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                        style="background-color: #EBDCC5;" name="password_confirmation" required>
                    <div class="absolute inset-y-0 right-0 top-7 pr-3 flex items-center cursor-pointer" @click="show = !show">
                        <svg x-show="!show" class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12c2.5 2 11.5 2 14 0" />
                            <line x1="6" y1="14" x2="5" y2="16" />
                            <line x1="8" y1="14.5" x2="7.5" y2="16.5" />
                            <line x1="10" y1="15" x2="10" y2="17" />
                            <line x1="12" y1="15" x2="12.5" y2="17" />
                            <line x1="14" y1="14.5" x2="15" y2="16.5" />
                            <line x1="16" y1="14" x2="17" y2="16" />
                        </svg>
                        <svg x-show="show" x-cloak class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5C21.27 8.11 17 4.5 12 4.5z" />
                            <circle cx="12" cy="12" r="3" fill="currentColor" />
                        </svg>
                    </div>

                     @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <button 
                type="submit" class="w-full py-3 bg-[#1C787F] text-white rounded-lg hover:bg-cyan-900 focus:outline-none">
                    Daftar
                </button>

                <div class="text-center mt-6 flex justify-center font-sans">
                    <p>Sudah memiliki Akun?  <a href="{{ route('login.form') }}" class="text-blue-600  hover:text-blue-500 hover:underline transition-all duration-300 ease-in-out"> login</a></p>
                </div>

        </form>
       
    </div>

</body>