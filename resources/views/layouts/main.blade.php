<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP 54 Surabaya - Sistem Ekstrakurikuler')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
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
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .dropdown {
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .dropdown.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        .scroll-smooth {
            scroll-behavior: smooth;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-purple-50 via-yellow-50 to-purple-100 min-h-screen scroll-smooth">
    <!-- Header -->
    <nav class="gradient-purple-yellow text-white p-4 shadow-lg fixed w-full top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-school text-purple-600 text-lg"></i>
                </div>
                <h1 class="text-xl font-bold">SMP 54 Surabaya</h1>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-yellow-200 transition duration-300 {{ request()->routeIs('home') ? 'text-yellow-200 font-semibold' : '' }}">Beranda</a>
                <a href="#berita" class="hover:text-yellow-200 transition duration-300">Berita</a>
                <a href="#ekstrakurikuler" class="hover:text-yellow-200 transition duration-300">Ekstrakurikuler</a>
                <a href="#tentang" class="hover:text-yellow-200 transition duration-300">Tentang</a>
                
                <!-- Login Dropdown -->
                <div class="relative">
                    <button id="loginDropdown" class="bg-white text-purple-600 font-bold py-2 px-6 rounded-full hover:bg-yellow-100 transition duration-300 shadow-lg flex items-center space-x-2">
                        <span>Login</span>
                        <i class="fas fa-chevron-down text-sm transition-transform duration-300"></i>
                    </button>
                    <div id="dropdownMenu" class="dropdown absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200">
                        <a href="{{ route('admin.login') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-t-lg transition duration-300">
                            <i class="fas fa-user-cog text-purple-600 mr-3"></i>
                            Login Admin
                        </a>
                        <hr class="border-gray-200">
                        <a href="{{ route('murid.login') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-50 rounded-b-lg transition duration-300">
                            <i class="fas fa-user-graduate text-yellow-600 mr-3"></i>
                            Login Siswa
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-white">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('home') }}" class="text-white hover:text-yellow-200 transition duration-300">Beranda</a>
                <a href="#berita" class="text-white hover:text-yellow-200 transition duration-300">Berita</a>
                <a href="#ekstrakurikuler" class="text-white hover:text-yellow-200 transition duration-300">Ekstrakurikuler</a>
                <a href="#tentang" class="text-white hover:text-yellow-200 transition duration-300">Tentang</a>
                <hr class="border-purple-300">
                <a href="{{ route('admin.login') }}" class="text-white hover:text-yellow-200 transition duration-300 flex items-center">
                    <i class="fas fa-user-cog mr-2"></i> Login Admin
                </a>
                <a href="{{ route('murid.login') }}" class="text-white hover:text-yellow-200 transition duration-300 flex items-center">
                    <i class="fas fa-user-graduate mr-2"></i> Login Siswa
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 gradient-purple-yellow rounded-full flex items-center justify-center">
                            <i class="fas fa-school text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold">SMP 54 Surabaya</h3>
                    </div>
                    <p class="text-gray-400 mb-4">Sistem Ekstrakurikuler Digital yang memajukan pendidikan Indonesia dengan teknologi modern dan inovasi berkelanjutan.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f text-xl"></i>
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
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Berita</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Ekstrakurikuler</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Tentang Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Surabaya, Jawa Timur</li>
                        <li><i class="fas fa-phone mr-2"></i>(031) 123-4567</li>
                        <li><i class="fas fa-envelope mr-2"></i>info@smp54sby.sch.id</li>
                    </ul>
                </div>
            </div>
            <hr class="border-gray-700 my-8">
            <div class="text-center text-gray-400">
                <p>&copy; 2024 SMP 54 Surabaya. All rights reserved.</p>
                <p class="text-sm mt-2">Sistem Ekstrakurikuler Digital - Memajukan Pendidikan Indonesia</p>
            </div>
        </div>
    </footer>

    <script>
        // Login Dropdown
        const loginDropdown = document.getElementById('loginDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const chevron = loginDropdown.querySelector('.fa-chevron-down');

        loginDropdown.addEventListener('click', (e) => {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
            chevron.style.transform = dropdownMenu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0deg)';
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!loginDropdown.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
                chevron.style.transform = 'rotate(0deg)';
            }
        });

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>