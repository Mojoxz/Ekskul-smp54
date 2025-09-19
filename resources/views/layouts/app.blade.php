<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP 54 Surabaya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <style>
        /* Modern Gradients */
        .gradient-purple-blue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .gradient-modern-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        }
        .gradient-modern-accent {
            background: linear-gradient(135deg, #4facfe 0%, #eafeffff 100%);
        }
        .gradient-glass {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        /* Advanced Animations */
        .floating-smooth {
            animation: floating-smooth 4s ease-in-out infinite;
        }
        @keyframes floating-smooth {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-8px) rotate(1deg); }
            50% { transform: translateY(-15px) rotate(0deg); }
            75% { transform: translateY(-8px) rotate(-1deg); }
        }
        
        .glow-effect {
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }
        .glow-effect:hover {
            box-shadow: 0 0 30px rgba(102, 126, 234, 0.6);
            transform: translateY(-2px);
        }
        
        /* Modern Navigation */
        .nav-modern {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nav-link {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            transition: left 0.3s ease;
        }
        .nav-link:hover::before,
        .nav-link.active::before {
            left: 0;
        }
        
        /* Modern Button Styles */
        .btn-modern {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 50px;
            padding: 12px 24px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            transition: left 0.5s ease;
        }
        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        .btn-modern:hover::before {
            left: 0;
        }
        
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Modern Mobile Menu */
        .mobile-menu-modern {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 15px;
            margin-top: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Glass Morphism Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    <!-- Modern Header -->
    <nav class="gradient-modern-primary text-white shadow-2xl sticky top-0 z-50 nav-modern">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo Section -->
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 glass-card flex items-center justify-center floating-smooth">
                            <img src="{{ asset('logo.png') }}" 
                                alt="Logo Ekskul" 
                                class="w-8 h-8">
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                            SMP 54 Surabaya
                        </h1>
                        <p class="text-xs opacity-75 text-blue-200">Sistem Ekstrakurikuler Digital</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="nav-link hover:text-blue-200 transition duration-300 px-3 py-2 rounded-lg {{ request()->routeIs('home') ? 'text-blue-200 active' : '' }}">
                        <i class="fas fa-home mr-2"></i> Beranda
                    </a>
                    <a href="{{ route('tentang') }}" class="nav-link hover:text-blue-200 transition duration-300 px-3 py-2 rounded-lg {{ request()->routeIs('tentang') ? 'text-blue-200 active' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i> Tentang
                    </a>
                    <a href="{{ route('berita') }}" class="nav-link hover:text-blue-200 transition duration-300 px-3 py-2 rounded-lg {{ request()->routeIs('berita*') ? 'text-blue-200 active' : '' }}">
                        <i class="fas fa-newspaper mr-2"></i> Berita
                    </a>
                    <a href="{{ route('ekstrakurikuler') }}" class="nav-link hover:text-blue-200 transition duration-300 px-3 py-2 rounded-lg {{ request()->routeIs('ekstrakurikuler') ? 'text-blue-200 active' : '' }}">
                        <i class="fas fa-users mr-2"></i> Ekstrakurikuler
                    </a>
                    <a href="{{ route('kontak') }}" class="nav-link hover:text-blue-200 transition duration-300 px-3 py-2 rounded-lg {{ request()->routeIs('kontak') ? 'text-blue-200 active' : '' }}">
                        <i class="fas fa-phone mr-2"></i> Kontak
                    </a>
                </div>

                <!-- Login Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('murid.login') }}" class="btn-modern glow-effect">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login Siswa
                    </a>
                    
                    <!-- Hidden Admin Login -->
                    <a href="{{ route('admin.login') }}" class="hidden">Admin</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white glass-card p-3 rounded-lg hover:bg-white/20 transition duration-300" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Modern Mobile Menu -->
            <div id="mobile-menu" class="md:hidden mt-4 pb-4 hidden mobile-menu-modern p-4">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="flex items-center hover:bg-white/10 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-home mr-3 w-5"></i> Beranda
                    </a>
                    <a href="{{ route('tentang') }}" class="flex items-center hover:bg-white/10 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-info-circle mr-3 w-5"></i> Tentang
                    </a>
                    <a href="{{ route('berita') }}" class="flex items-center hover:bg-white/10 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-newspaper mr-3 w-5"></i> Berita
                    </a>
                    <a href="{{ route('ekstrakurikuler') }}" class="flex items-center hover:bg-white/10 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-users mr-3 w-5"></i> Ekstrakurikuler
                    </a>
                    <a href="{{ route('kontak') }}" class="flex items-center hover:bg-white/10 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-phone mr-3 w-5"></i> Kontak
                    </a>
                    <div class="border-t border-white/20 pt-3 mt-3">
                        <a href="{{ route('murid.login') }}" class="flex items-center hover:bg-white/10 p-3 rounded-lg transition duration-300">
                            <i class="fas fa-user-graduate mr-3 w-5"></i> Login Siswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Modern Footer -->
    <footer class="bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 text-white py-16 mt-20 relative">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #667eea 0%, transparent 50%), radial-gradient(circle at 75% 75%, #764ba2 0%, transparent 50%);"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand Section -->
                <div class="col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-16 h-16 gradient-modern-accent rounded-2xl flex items-center justify-center floating-smooth">
                            <img src="{{ asset('logo.png') }}" 
                            alt="Logo Ekskul" 
                            class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                                SMP 54 Surabaya
                            </h3>
                            <p class="text-gray-300 text-sm">Sistem Ekstrakurikuler Digital</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Platform modern yang menghubungkan teknologi dengan pendidikan untuk menciptakan pengalaman ekstrakurikuler yang lebih baik dan terintegrasi.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="glass-card p-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/20 transition duration-300">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="glass-card p-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/20 transition duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="glass-card p-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/20 transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="glass-card p-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/20 transition duration-300">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-blue-200">Menu Utama</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white hover:translate-x-2 transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Beranda
                        </a></li>
                        <li><a href="{{ route('tentang') }}" class="text-gray-300 hover:text-white hover:translate-x-2 transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Tentang Kami
                        </a></li>
                        <li><a href="{{ route('berita') }}" class="text-gray-300 hover:text-white hover:translate-x-2 transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Berita
                        </a></li>
                        <li><a href="{{ route('ekstrakurikuler') }}" class="text-gray-300 hover:text-white hover:translate-x-2 transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Ekstrakurikuler
                        </a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-blue-200">Hubungi Kami</h4>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-start space-x-3">
                            <div class="glass-card p-2 rounded-lg mt-1">
                                <i class="fas fa-map-marker-alt text-blue-400"></i>
                            </div>
                            <span>Jl. Pendidikan No. 54, Surabaya</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <div class="glass-card p-2 rounded-lg mt-1">
                                <i class="fas fa-phone text-blue-400"></i>
                            </div>
                            <span>(031) 123-4567</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <div class="glass-card p-2 rounded-lg mt-1">
                                <i class="fas fa-envelope text-blue-400"></i>
                            </div>
                            <span>info@smp54sby.sch.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <div class="glass-card p-6 rounded-2xl">
                    <p class="text-gray-300 mb-2">&copy; 2024 SMP 54 Surabaya. All rights reserved.</p>
                    <p class="text-sm text-gray-400">
                        Sistem Ekstrakurikuler Digital - Memajukan Pendidikan dengan Teknologi Modern
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Enhanced mobile menu close functionality
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = event.target.closest('button');
            
            if (!button && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Add smooth scroll behavior
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

        // Add parallax effect on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.floating-smooth');
            const speed = 0.5;
            
            parallax.forEach(element => {
                const yPos = -(scrolled * speed);
                element.style.transform = `translate3d(0, ${yPos}px, 0)`;
            });
        });
    </script>
</body>
</html>