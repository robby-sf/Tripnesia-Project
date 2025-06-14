<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }

        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 md:p-12 rounded-lg shadow-sm w-full max-w-2xl" x-data="{ show: false }">
        <h1 class="text-2xl font-light text-gray-700 tracking-wider mb-8">ACCOUNT SETTINGS</h1>

        <form action="#" method="POST" class="space-y-6">
            <div>
                <label for="first-name" class="block text-sm font-medium text-gray-500 mb-1">First name</label>
                <input type="text" id="first-name" name="first-name" value="Ryan"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>

            <div>
                <label for="last-name" class="block text-sm font-medium text-gray-500 mb-1">Last name</label>
                <input type="text" id="last-name" name="last-name" value="Gosling"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-500 mb-1">Username</label>
                <input type="text" id="username" name="username" value="Sebastian"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-500 mb-1">Password</label>
                <input :type="show ? 'text' : 'password'" id="password" name="password" value="12345678"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">

                <div class="absolute inset-y-0 right-0 top-7 pr-3 flex items-center cursor-pointer" @click="show = !show">
                    <svg x-show="!show" class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="show" x-cloak class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.963 9.963 0 012.233-3.592m1.735-1.4A9.99 9.99 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.971 9.971 0 01-4.343 5.303M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18" />
                    </svg>
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-500 mb-1">E-mail</label>
                <input type="email" id="email" name="email" value="ryan876@gmail.com"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>

            <div>
                <label for="phone-number" class="block text-sm font-medium text-gray-500 mb-1">Phone number</label>
                <input type="tel" id="phone-number" name="phone-number" value="+380990760179"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>

            <!-- Buttons -->
            <div class="flex items-center space-x-6 pt-4">
                <button type="submit"
                    class="bg-amber-500 text-white font-semibold py-2.5 px-10 rounded-full hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition-color duration-300 ">
                    Save
                </button>
                <a href="#" class="text-gray-600 py-2.5 px-10 rounded-full hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition-color duration-300 ">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
