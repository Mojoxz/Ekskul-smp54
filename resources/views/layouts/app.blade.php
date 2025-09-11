<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP 54 Surabaya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-purple-yellow {
            background: linear-gradient(135deg, #8B5CF6 0%, #F59E0B 100%);
        }
        .gradient-yellow-purple {
            background: linear-gradient(135deg, #F59E0B 0%, #8B5CF6 100%);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 via-yellow-50 to-purple-100 min-h-screen">
    <!-- Header -->
    <nav class="gradient-purple-yellow text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-purple-600"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">SMP 54 Surabaya</h1>
                        <p class="text-xs opacity-90">Sistem Ekstrakurikuler</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="hover:text-yellow-300 transition duration-300 {{ request()->routeIs('home') ? 'text-yellow-300' : '' }}">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                    <a href="{{ route('tentang') }}" class="hover:text-yellow-300 transition duration-300 {{ request()->routeIs('tentang') ? 'text-yellow-300' : '' }}">
                        <i class="fas fa-info-circle mr-1"></i> Tentang
                    </a>
                    <a href="{{ route('berita') }}" class="hover:text-yellow-300 transition duration-300 {{ request()->routeIs('berita*') ? 'text-yellow-300' : '' }}">
                        <i class="fas fa-newspaper mr-1"></i> Berita
                    </a>
                    <a href="{{ route('ekstrakurikuler') }}" class="hover:text-yellow-300 transition duration-300 {{ request()->routeIs('ekstrakurikuler') ? 'text-yellow-300' : '' }}">
                        <i class="fas fa-users mr-1"></i> Ekstrakurikuler
                    </a>
                    <a href="{{ route('kontak') }}" class="hover:text-yellow-300 transition duration-300 {{ request()->routeIs('kontak') ? 'text-yellow-300' : '' }}">
                        <i class="fas fa-phone mr-1"></i> Kontak
                    </a>
                </div>

                <!-- Login Dropdown -->
                <div class="relative dropdown">
                    <button class="bg-white text-purple-600 px-4 py-2 rounded-full font-semibold hover:bg-yellow-100 transition duration-300 flex items-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                        <i class="fas fa-chevron-down ml-1"></i>
                    </button>
                    <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                        <a href="{{ route('admin.login') }}" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition duration-300 rounded-t-lg">
                            <i class="fas fa-user-shield mr-2"></i> Login Admin
                        </a>
                        <a href="{{ route('murid.login') }}" class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition duration-300 rounded-b-lg border-t border-gray-200">
                            <i class="fas fa-user-graduate mr-2"></i> Login Siswa
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden mt-4 pb-4 hidden">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="hover:text-yellow-300 transition duration-300">
                        <i class="fas fa-home mr-2"></i> Beranda
                    </a>
                    <a href="{{ route('tentang') }}" class="hover:text-yellow-300 transition duration-300">
                        <i class="fas fa-info-circle mr-2"></i> Tentang
                    </a>
                    <a href="{{ route('berita') }}" class="hover:text-yellow-300 transition duration-300">
                        <i class="fas fa-newspaper mr-2"></i> Berita
                    </a>
                    <a href="{{ route('ekstrakurikuler') }}" class="hover:text-yellow-300 transition duration-300">
                        <i class="fas fa-users mr-2"></i> Ekstrakurikuler
                    </a>
                    <a href="{{ route('kontak') }}" class="hover:text-yellow-300 transition duration-300">
                        <i class="fas fa-phone mr-2"></i> Kontak
                    </a>
                    <hr class="border-purple-300">
                    <a href="{{ route('admin.login') }}" class="hover:text-yellow-300 transition duration-300">
                        <i class="fas fa-user-shield mr-2"></i> Login Admin
                    </a>
                    <a href="{{ route('murid.login') }}" class="hover:text-yellow-300 transition duration-300">
                        <i class="fas fa-user-graduate mr-2"></i> Login Siswa
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">SMP 54 Surabaya</h3>
                            <p class="text-gray-400 text-sm">Sistem Ekstrakurikuler Digital</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4">Platform modern untuk mengelola dan memantau kegiatan ekstrakurikuler dengan mudah dan efisien.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu Utama</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="{{ route('tentang') }}" class="text-gray-400 hover:text-white transition duration-300">Tentang Kami</a></li>
                        <li><a href="{{ route('berita') }}" class="text-gray-400 hover:text-white transition duration-300">Berita</a></li>
                        <li><a href="{{ route('ekstrakurikuler') }}" class="text-gray-400 hover:text-white transition duration-300">Ekstrakurikuler</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Jl. Pendidikan No. 54, Surabaya
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            (031) 123-4567
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            info@smp54sby.sch.id
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-gray-700 my-8">
            <div class="text-center text-gray-400">
                <p>&copy; 2024 SMP 54 Surabaya. All rights reserved.</p>
                <p class="text-sm mt-1">Sistem Ekstrakurikuler Digital - Memajukan Pendidikan Indonesia</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = event.target.closest('button');
            
            if (!button && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>