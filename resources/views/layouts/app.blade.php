<!DOCTYPE html>
<!-- resources/views/layouts/app.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP 54 Surabaya - Ekstrakurikuler')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">SMP 54 Surabaya</h1>
            <div class="flex space-x-4">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-200">Dashboard</a>
                        <a href="{{ route('admin.murid.index') }}" class="hover:text-blue-200">Murid</a>
                        <a href="{{ route('admin.ekskul.index') }}" class="hover:text-blue-200">Ekskul</a>
                        <a href="{{ route('admin.rekap.presensi') }}" class="hover:text-blue-200">Rekap</a>
                        <a href="{{ route('admin.berita.index') }}" class="hover:text-blue-200">Berita</a>
                    @else
                        <a href="{{ route('murid.homepage') }}" class="hover:text-blue-200">Home</a>
                        <a href="{{ route('murid.dashboard') }}" class="hover:text-blue-200">Dashboard</a>
                        <a href="{{ route('murid.presensi') }}" class="hover:text-blue-200">Presensi</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-blue-200">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <p>&copy; 2024 SMP 54 Surabaya. All rights reserved.</p>
    </footer>
</body>
</html>
