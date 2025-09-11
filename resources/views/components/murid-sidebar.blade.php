<!-- resources/views/components/murid-sidebar.blade.php -->
<div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-yellow-500 to-yellow-600 transform -translate-x-full transition-transform duration-200 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center h-20 shadow-md">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <h1 class="text-white text-lg font-bold">Student Panel</h1>
                <p class="text-yellow-200 text-xs">SMP 54 Surabaya</p>
            </div>
        </div>
    </div>

    <nav class="mt-5 px-2">
        <div class="space-y-1">
            <!-- Beranda -->
            <a href="{{ route('murid.homepage') }}"
               class="sidebar-link text-yellow-100 hover:bg-yellow-400 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('murid.homepage') ? 'bg-yellow-400 text-white shadow-md' : '' }}">
                <svg class="text-yellow-200 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                Beranda
            </a>

            <!-- Dashboard -->
            <a href="{{ route('murid.dashboard') }}"
               class="sidebar-link text-yellow-100 hover:bg-yellow-400 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('murid.dashboard') ? 'bg-yellow-400 text-white shadow-md' : '' }}">
                <svg class="text-yellow-200 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                </svg>
                Dashboard
                @if(request()->routeIs('murid.dashboard'))
                    <span class="ml-auto w-2 h-2 bg-purple-600 rounded-full"></span>
                @endif
            </a>

            <!-- Presensi -->
            <a href="{{ route('murid.presensi') }}"
               class="sidebar-link text-yellow-100 hover:bg-yellow-400 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('murid.presensi') ? 'bg-yellow-400 text-white shadow-md' : '' }}">
                <svg class="text-yellow-200 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                </svg>
                Presensi
                @if(request()->routeIs('murid.presensi'))
                    <span class="ml-auto w-2 h-2 bg-purple-600 rounded-full"></span>
                @endif
            </a>
        </div>

        <!-- Informasi Ekstrakurikuler -->
        <div class="mt-6 pt-6 border-t border-yellow-400">
            <div class="px-2 py-2">
                <h3 class="text-xs font-semibold text-yellow-200 uppercase tracking-wider">Ekstrakurikuler Anda</h3>
            </div>
            <div class="space-y-1">
                @php
                    $selectedEkskul = session('selected_ekskul');
                @endphp
                @if($selectedEkskul)
                <div class="px-2 py-3 bg-yellow-400 bg-opacity-50 rounded-md">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002 2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">{{ $selectedEkskul->nama }}</p>
                            <p class="text-xs text-yellow-200">{{ $selectedEkskul->hari }} • {{ date('H:i', strtotime($selectedEkskul->jam_mulai)) }}-{{ date('H:i', strtotime($selectedEkskul->jam_selesai)) }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Statistics Quick View -->
        <div class="mt-6 pt-6 border-t border-yellow-400">
            <div class="px-2 py-2">
                <h3 class="text-xs font-semibold text-yellow-200 uppercase tracking-wider">Statistik Singkat</h3>
            </div>
            <div class="px-2 space-y-3">
                @php
                    // Get quick stats (you might need to pass these from controller)
                    $totalHadir = auth()->user()->presensis()->where('status', 'hadir')->count();
                    $totalIzin = auth()->user()->presensis()->where('status', 'izin')->count();
                    $totalTidakHadir = auth()->user()->presensis()->where('status', 'tidak_hadir')->count();
                @endphp

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                        <span class="text-xs text-yellow-100">Hadir</span>
                    </div>
                    <span class="text-sm font-bold text-white">{{ $totalHadir }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-amber-500 rounded-full mr-2"></div>
                        <span class="text-xs text-yellow-100">Izin</span>
                    </div>
                    <span class="text-sm font-bold text-white">{{ $totalIzin }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                        <span class="text-xs text-yellow-100">Tidak Hadir</span>
                    </div>
                    <span class="text-sm font-bold text-white">{{ $totalTidakHadir }}</span>
                </div>
            </div>
        </div>

        <!-- User Profile & Logout -->
        <div class="absolute bottom-0 left-0 right-0 p-2">
            <div class="space-y-1">
                <!-- User Profile -->
                <div class="px-2 py-3">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-yellow-200">{{ auth()->user()->kelas }}</p>
                        </div>
                    </div>
                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-yellow-100 hover:bg-yellow-400 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150">
                        <svg class="text-yellow-200 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>

<!-- Mobile sidebar overlay -->
<div id="sidebar-overlay" class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 hidden lg:hidden"></div>

<!-- Mobile menu button -->
<div class="sticky top-0 z-10 lg:hidden bg-gradient-to-r from-yellow-500 to-yellow-600 px-1 pt-1 pb-1 sm:px-3 sm:pb-3">
    <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
            <button id="mobile-menu-button" class="bg-yellow-600 inline-flex items-center justify-center p-2 rounded-md text-yellow-100 hover:text-white hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        <div class="flex items-center">
            <span class="text-white font-medium text-sm">{{ auth()->user()->name }}</span>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const mobileMenuButton = document.getElementById('mobile-menu-button');

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

    mobileMenuButton.addEventListener('click', openSidebar);
    overlay.addEventListener('click', closeSidebar);

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth < 1024) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnMenuButton = mobileMenuButton.contains(event.target);

            if (!isClickInsideSidebar && !isClickOnMenuButton && !sidebar.classList.contains('-translate-x-full')) {
                closeSidebar();
            }
        }
    });
});
</script>
