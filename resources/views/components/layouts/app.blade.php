<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>BAG Transport</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Branding -->
            <a href="{{ route('dashboard') }}" class="font-bold text-xl text-blue-700 hover:text-blue-800">
                BAG Travel
            </a>

            <!-- Menu -->
            <!-- Menu -->
            <div class="flex items-center space-x-6">
                @auth
                    @if(Auth::user()->role !== 'admin')
                        <a href="{{ route('tiket.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Tiket</a>
                        <a href="{{ route('riwayat.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Riwayat</a>
                    @endif

                    <span class="text-gray-600 font-semibold">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-red-600 hover:text-red-800 font-medium">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 font-medium">Register</a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto py-8">
        {{ $slot }}
    </main>
</body>
</html>