<!-- resources/views/layouts/murid.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Siswa - SMP 54 Surabaya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        @media (min-width: 1024px) {
            .main-content {
                margin-left: 16rem; /* w-64 = 16rem */
            }
        }
        
        .gradient-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        
        .gradient-student {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #0e7490 100%);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }
        
        .sidebar-link.active {
            background-color: rgba(6, 182, 212, 0.2);
            border-right: 4px solid #fbbf24;
        }

        .pulse-soft {
            animation: pulse-soft 2s ease-in-out infinite;
        }

        @keyframes pulse-soft {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-cyan-50 to-blue-100 min-h-screen">
    
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-cyan-600 via-cyan-700 to-blue-800 sidebar-transition transform -translate-x-full lg:translate-x-0 shadow-2xl">
        <!-- Logo Section -->
        <div class="flex items-center justify-center h-20 px-4 border-b border-cyan-600/30">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-xl flex items-center justify-center shadow-lg floating">
                    <i class="fas fa-user-graduate text-cyan-800 text-lg"></i>
                </div>
                <div>
                    <h1 class="text-white text-lg font-bold">Dashboard Siswa</h1>
                    <p class="text-cyan-200 text-xs">SMP 54 Surabaya</p>
                </div>
            </div>
        </div>

        <!-- Student Info Section -->
        <div class="px-4 py-4 border-b border-cyan-600/30">
            <div class="bg-cyan-800/40 rounded-xl p-3 backdrop-blur-sm">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-full flex items-center justify-center shadow-md">
                        <i class="fas fa-user text-cyan-800 text-sm"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name ?? 'Siswa' }}</p>
                        <p class="text-xs text-cyan-200">{{ auth()->user()->kelas ?? 'Kelas' }}</p>
                        @if(isset($selectedEkskul))
                            <p class="text-xs text-yellow-300">{{ $selectedEkskul->nama }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-4 px-4">
            <div class="space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('murid.dashboard') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group hover-lift
                          {{ request()->routeIs('murid.dashboard') ? 'bg-cyan-700 text-white shadow-lg' : 'text-cyan-100 hover:bg-cyan-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-cyan-600/40 rounded-lg flex items-center justify-center mr-3 group-hover:bg-cyan-600/60 transition-colors">
                        <i class="fas fa-home text-sm"></i>
                    </div>
                    <span>Dashboard</span>
                    @if(request()->routeIs('murid.dashboard'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full pulse-soft"></div>
                    @endif
                </a>

                <!-- Presensi -->
                <a href="{{ route('murid.presensi') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group hover-lift
                          {{ request()->routeIs('murid.presensi*') ? 'bg-cyan-700 text-white shadow-lg' : 'text-cyan-100 hover:bg-cyan-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-green-600/40 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-600/60 transition-colors">
                        <i class="fas fa-calendar-check text-sm"></i>
                    </div>
                    <span>Presensi</span>
                    @if(request()->routeIs('murid.presensi*'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full pulse-soft"></div>
                    @endif
                </a>

                <!-- Beranda/Homepage -->
                <a href="{{ route('murid.homepage') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group hover-lift
                          {{ request()->routeIs('murid.homepage') ? 'bg-cyan-700 text-white shadow-lg' : 'text-cyan-100 hover:bg-cyan-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-blue-600/40 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-600/60 transition-colors">
                        <i class="fas fa-newspaper text-sm"></i>
                    </div>
                    <span>Berita & Info</span>
                    @if(request()->routeIs('murid.homepage'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full pulse-soft"></div>
                    @endif
                </a>

                <!-- Separator -->
                <div class="my-4 border-t border-cyan-600/30"></div>

                <!-- Profil -->
                <a href="{{ route('profile.show') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group hover-lift
                          {{ request()->routeIs('profile.*') ? 'bg-cyan-700 text-white shadow-lg' : 'text-cyan-100 hover:bg-cyan-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-purple-600/40 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-600/60 transition-colors">
                        <i class="fas fa-user-circle text-sm"></i>
                    </div>
                    <span>Profil Saya</span>
                    @if(request()->routeIs('profile.*'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full pulse-soft"></div>
                    @endif
                </a>

                <!-- Kembali ke Website Utama -->
                <a href="{{ route('home') }}" target="_blank"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group text-cyan-100 hover:bg-indigo-600/20 hover:text-indigo-200 border border-indigo-500/30 hover-lift">
                    <div class="w-8 h-8 bg-indigo-600/40 rounded-lg flex items-center justify-center mr-3 group-hover:bg-indigo-600/60 transition-colors">
                        <i class="fas fa-globe text-sm"></i>
                    </div>
                    <span>Website Utama</span>
                    <div class="ml-auto">
                        <i class="fas fa-external-link-alt text-xs text-indigo-300 opacity-70"></i>
                    </div>
                </a>
            </div>

            <!-- Separator -->
            <div class="my-6 border-t border-cyan-600/50"></div>

            <!-- Bottom Section -->
            <div class="space-y-2">
                <!-- Help/Bantuan -->
                <button class="w-full sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group text-cyan-100 hover:bg-cyan-700/50 hover:text-white">
                    <div class="w-8 h-8 bg-orange-600/40 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-600/60 transition-colors">
                        <i class="fas fa-question-circle text-sm"></i>
                    </div>
                    <span>Bantuan</span>
                </button>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group text-cyan-100 hover:bg-red-600/20 hover:text-red-200 hover-lift">
                        <div class="w-8 h-8 bg-red-600/40 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-600/60 transition-colors">
                            <i class="fas fa-sign-out-alt text-sm"></i>
                        </div>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Mobile sidebar overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm hidden lg:hidden transition-opacity duration-300"></div>

    <!-- Main Content Area -->
    <div class="main-content min-h-screen transition-all duration-300">
        <!-- Top Header for Mobile & Desktop -->
        <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-cyan-200/50 sticky top-0 z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Mobile menu button -->
                    <div class="lg:hidden">
                        <button id="mobile-menu-button" class="p-2 rounded-md text-cyan-600 hover:text-cyan-800 hover:bg-cyan-100 transition-colors">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>

                    <!-- Header Content -->
                    <div class="flex-1 lg:flex lg:items-center lg:justify-between">
                        <div class="hidden lg:block">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard Siswa')</h2>
                                    <p class="text-sm text-gray-600">@yield('page-subtitle', 'Kelola aktivitas ekstrakurikuler Anda')</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right side actions -->
                        <div class="flex items-center space-x-4">
                            <!-- Quick Presensi Button -->
                            <a href="{{ route('murid.presensi') }}" class="hidden sm:flex items-center px-3 py-1.5 text-xs font-medium text-cyan-700 bg-cyan-100 hover:bg-cyan-200 rounded-full transition-colors">
                                <i class="fas fa-calendar-check mr-1.5"></i>
                                Presensi
                            </a>

                            <!-- Notifications -->
                            <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-full transition-colors relative">
                                <i class="fas fa-bell text-lg"></i>
                                <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full pulse-soft"></span>
                            </button>
                            
                            <!-- Current time -->
                            <div class="hidden sm:block text-sm text-gray-500">
                                <i class="fas fa-clock mr-1"></i>
                                <span id="current-time"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-xl flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-6 bg-yellow-100 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-xl flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    {{ session('warning') }}
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white/60 backdrop-blur-md border-t border-cyan-200/50 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        © {{ date('Y') }} SMP 54 Surabaya. Semua hak dilindungi.
                    </div>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span>Versi 1.0</span>
                        <span>•</span>
                        <span>Sistem Ekstrakurikuler</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const mobileMenuButton = document.getElementById('mobile-menu-button');

            // Mobile sidebar controls
            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            // Event listeners
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', openSidebar);
            }
            
            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

            // Close sidebar when pressing Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && window.innerWidth < 1024) {
                    closeSidebar();
                }
            });

            // Update current time
            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('id-ID', { 
                    hour: '2-digit', 
                    minute: '2-digit' 
                });
                const timeElement = document.getElementById('current-time');
                if (timeElement) {
                    timeElement.textContent = timeString;
                }
            }

            updateTime();
            setInterval(updateTime, 1000);

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    closeSidebar();
                }
            });

            // Add smooth scroll behavior
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>