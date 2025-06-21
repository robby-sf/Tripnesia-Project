<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <link rel="icon" type="png" href="/Asset/icon Web.png">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full text-gray-800">
        <div class="flex justify-center mb-6">
            {{-- Placeholder for a relevant illustration --}}
            <img src="{{ asset('storage/Asset/reset.png') }}" alt="Reset Password Illustration" class="w-24 h-24 mb-4">
        </div>
        
        <h2 class="text-4xl font-semibold mb-2 text-center">Reset Your Password</h2>
        <p class="text-gray-600 mb-8 text-center text-sm">Set your new password below.</p>

        <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6">

            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            @if (session('status'))
            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-6 text-center text-sm font-medium">
                {{ session('status') }}
            </div>
            @endif
            <div>
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="e.g. username@kinety.com" 
                    required 
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-gray-800 placeholder-gray-400 transition duration-200"
                >
                @error('email') 
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">New Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Enter new password" 
                    required 
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-gray-800 placeholder-gray-400 transition duration-200"
                >
                @error('password') 
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm New Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    placeholder="Confirm new password" 
                    required 
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-gray-800 placeholder-gray-400 transition duration-200"
                >
            </div>
            
            <button 
                type="submit" 
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-md"
            >
                Reset Password
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('adminFormLogin') }}" class="text-gray-600 hover:text-orange-500 text-sm font-medium transition duration-200">
                <span class="inline-block align-middle mr-1">&lt;</span> Back to Login
            </a>
        </div>
    </div>
</body>
</html>