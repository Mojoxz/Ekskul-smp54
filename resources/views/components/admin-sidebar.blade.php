<!-- resources/views/components/admin-sidebar.blade.php -->
<div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-purple-900 to-purple-800 transform -translate-x-full transition-transform duration-200 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center h-20 shadow-md">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mr-3">
                <svg class="w-6 h-6 text-purple-900" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-white text-lg font-bold">Admin Panel</h1>
                <p class="text-purple-300 text-xs">SMP 54 Surabaya</p>
            </div>
        </div>
    </div>

    <nav class="mt-5 px-2">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link text-purple-200 hover:bg-purple-700 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('admin.dashboard') ? 'bg-purple-700 text-white' : '' }}">
                <svg class="text-purple-300 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                </svg>
                Dashboard
            </a>

            <!-- Kelola Murid -->
            <a href="{{ route('admin.murid.index') }}"
               class="sidebar-link text-purple-200 hover:bg-purple-700 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('admin.murid.*') ? 'bg-purple-700 text-white' : '' }}">
                <svg class="text-purple-300 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                </svg>
                Kelola Murid
                @if(request()->routeIs('admin.murid.*'))
                    <span class="ml-auto w-2 h-2 bg-yellow-400 rounded-full"></span>
                @endif
            </a>

            <!-- Kelola Ekstrakurikuler -->
            <a href="{{ route('admin.ekskul.index') }}"
               class="sidebar-link text-purple-200 hover:bg-purple-700 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('admin.ekskul.*') ? 'bg-purple-700 text-white' : '' }}">
                <svg class="text-purple-300 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                </svg>
                Kelola Ekskul
                @if(request()->routeIs('admin.ekskul.*'))
                    <span class="ml-auto w-2 h-2 bg-yellow-400 rounded-full"></span>
                @endif
            </a>

            <!-- Rekap Presensi -->
            <a href="{{ route('admin.rekap.presensi') }}"
               class="sidebar-link text-purple-200 hover:bg-purple-700 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('admin.rekap.*') ? 'bg-purple-700 text-white' : '' }}">
                <svg class="text-purple-300 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Rekap Presensi
                @if(request()->routeIs('admin.rekap.*'))
                    <span class="ml-auto w-2 h-2 bg-yellow-400 rounded-full"></span>
                @endif
            </a>

            <!-- Kelola Berita -->
            <a href="{{ route('admin.berita.index') }}"
               class="sidebar-link text-purple-200 hover:bg-purple-700 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150
                      {{ request()->routeIs('admin.berita.*') ? 'bg-purple-700 text-white' : '' }}">
                <svg class="text-purple-300 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                </svg>
                Kelola Berita
                @if(request()->routeIs('admin.berita.*'))
                    <span class="ml-auto w-2 h-2 bg-yellow-400 rounded-full"></span>
                @endif
            </a>
        </div>

        <!-- Separator -->
        <div class="mt-6 pt-6 border-t border-purple-700">
            <div class="space-y-1">
                <!-- User Profile -->
                <div class="px-2 py-3">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-900" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-purple-300">Administrator</p>
                        </div>
                    </div>
                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-purple-200 hover:bg-purple-700 hover:text-white group flex items-center px-2 py-3 text-sm font-medium rounded-md transition-colors duration-150">
                        <svg class="text-purple-300 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
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
<div class="sticky top-0 z-10 lg:hidden bg-gradient-to-r from-purple-600 to-purple-700 px-1 pt-1 pb-1 sm:px-3 sm:pb-3">
    <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
            <button id="mobile-menu-button" class="bg-purple-700 inline-flex items-center justify-center p-2 rounded-md text-purple-200 hover:text-white hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
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
