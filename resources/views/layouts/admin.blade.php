<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - SMP 54 Surabaya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        @media (min-width: 1024px) {
            .main-content {
                margin-left: 16rem; /* w-64 = 16rem */
            }
        }
        
        .gradient-purple {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
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
            background-color: rgba(139, 69, 19, 0.3);
            border-right: 4px solid #fbbf24;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-purple-900 via-purple-800 to-purple-900 sidebar-transition transform -translate-x-full lg:translate-x-0 shadow-2xl">
        <!-- Logo Section -->
        <div class="flex items-center justify-center h-20 px-4 border-b border-purple-700/30">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg floating">
                    <i class="fas fa-graduation-cap text-purple-900 text-lg"></i>
                </div>
                <div>
                    <h1 class="text-white text-lg font-bold">Admin Panel</h1>
                    <p class="text-purple-300 text-xs">SMP 54 Surabaya</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-6 px-4">
            <div class="space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group
                          {{ request()->routeIs('admin.dashboard') ? 'bg-purple-700 text-white shadow-lg' : 'text-purple-200 hover:bg-purple-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-purple-600/30 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-600/50 transition-colors">
                        <i class="fas fa-tachometer-alt text-sm"></i>
                    </div>
                    <span>Dashboard</span>
                    @if(request()->routeIs('admin.dashboard'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                    @endif
                </a>

                <!-- Kelola Murid -->
                <a href="{{ route('admin.murid.index') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group
                          {{ request()->routeIs('admin.murid.*') ? 'bg-purple-700 text-white shadow-lg' : 'text-purple-200 hover:bg-purple-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-blue-600/30 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-600/50 transition-colors">
                        <i class="fas fa-user-graduate text-sm"></i>
                    </div>
                    <span>Kelola Murid</span>
                    @if(request()->routeIs('admin.murid.*'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                    @endif
                </a>

                <!-- Kelola Ekstrakurikuler -->
                <a href="{{ route('admin.ekskul.index') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group
                          {{ request()->routeIs('admin.ekskul.*') ? 'bg-purple-700 text-white shadow-lg' : 'text-purple-200 hover:bg-purple-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-green-600/30 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-600/50 transition-colors">
                        <i class="fas fa-users text-sm"></i>
                    </div>
                    <span>Kelola Ekskul</span>
                    @if(request()->routeIs('admin.ekskul.*'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                    @endif
                </a>

                <!-- Rekap Presensi -->
                <a href="{{ route('admin.rekap.presensi') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group
                          {{ request()->routeIs('admin.rekap.*') ? 'bg-purple-700 text-white shadow-lg' : 'text-purple-200 hover:bg-purple-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-yellow-600/30 rounded-lg flex items-center justify-center mr-3 group-hover:bg-yellow-600/50 transition-colors">
                        <i class="fas fa-chart-bar text-sm"></i>
                    </div>
                    <span>Rekap Presensi</span>
                    @if(request()->routeIs('admin.rekap.*'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                    @endif
                </a>

                <!-- Kelola Berita -->
                <a href="{{ route('admin.berita.index') }}"
                   class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group
                          {{ request()->routeIs('admin.berita.*') ? 'bg-purple-700 text-white shadow-lg' : 'text-purple-200 hover:bg-purple-700/50 hover:text-white' }}">
                    <div class="w-8 h-8 bg-indigo-600/30 rounded-lg flex items-center justify-center mr-3 group-hover:bg-indigo-600/50 transition-colors">
                        <i class="fas fa-newspaper text-sm"></i>
                    </div>
                    <span>Kelola Berita</span>
                    @if(request()->routeIs('admin.berita.*'))
                        <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                    @endif
                </a>
            </div>

            <!-- Separator -->
            <div class="my-6 border-t border-purple-700/50"></div>

            <!-- User Profile & Settings -->
            <div class="space-y-2">
                <!-- Profile Info -->
                <div class="px-4 py-3 bg-purple-800/50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center shadow-md">
                            <i class="fas fa-user text-purple-900 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</p>
                            <p class="text-xs text-purple-300">Administrator</p>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group text-purple-200 hover:bg-purple-700/50 hover:text-white">
                    <div class="w-8 h-8 bg-gray-600/30 rounded-lg flex items-center justify-center mr-3 group-hover:bg-gray-600/50 transition-colors">
                        <i class="fas fa-cog text-sm"></i>
                    </div>
                    <span>Pengaturan</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group text-purple-200 hover:bg-red-600/20 hover:text-red-300">
                        <div class="w-8 h-8 bg-red-600/30 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-600/50 transition-colors">
                            <i class="fas fa-sign-out-alt text-sm"></i>
                        </div>
                        <span>Logout</span>
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
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Mobile menu button -->
                    <div class="lg:hidden">
                        <button id="mobile-menu-button" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>

                    <!-- Page title will be inserted here by individual pages -->
                    <div class="flex-1 lg:flex lg:items-center lg:justify-between">
                        <div class="hidden lg:block">
                            <!-- Breadcrumb or page title can go here -->
                        </div>
                        
                        <!-- Right side actions -->
                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors relative">
                                <i class="fas fa-bell text-lg"></i>
                                <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
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
            @yield('content')
        </main>
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
        });
    </script>
</body>
</html>