
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" type="png" href="/Asset/Logo Tripnesia.PNG">
  @vite('resources/css/app.css')
  <title>Tripnesia</title>
</head>

<body 
class=" bg-center bg-cover flex items-center h-screen justify-center" 
style="background-image: url('/Asset/LoginBack.jpg');">
    <div class="absolute inset-0 bg-black/50 z-0" w-250></div>


    <form method="POST" action="{{ route('login') }}" class="relative z-10">
        @csrf


        <div class="bg-amber-50 p-8 rounded-lg shadow-lg w-full  z-10">
        <img src="/Asset/Logo Tripnesia.PNG" alt="Logo Tripnesia" class="w-20 mx-auto mb-2">

        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">
            Login ke Tripnesia
        </h2>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600" >Email</label>
                <input class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                style="background-color: #EBDCC5;"
                type="email" name="email" required value="{{ old('email') }}">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label class="block text-sm font-medium text-gray-600" >Password</label>
                <input class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                style="background-color: #EBDCC5;"
                type="password" name="password" required>
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <a href="#" class="text-blue-500 mb-4">
            <p>Forgot Password?</p>
        </a>

        <button 
        type="submit" class="w-full py-3 bg-[#1C787F] text-white rounded-full hover:bg-cyan-900 focus:outline-none mt-4">
            Login
        </button>
        </div>
    </form>
    


</body>