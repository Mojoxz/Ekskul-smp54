<!DOCTYPE html>
<!-- resources/views/layouts/app.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP 54 Surabaya - Ekstrakurikuler')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .gradient-purple-yellow {
            background: linear-gradient(135deg, #8B5CF6 0%, #F59E0B 100%);
        }
        .gradient-yellow-purple {
            background: linear-gradient(135deg, #F59E0B 0%, #8B5CF6 100%);
        }
        .icon-fix {
            width: 1.25rem;
            height: 1.25rem;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 via-yellow-50 to-purple-100 min-h-screen">
    @auth
        @if(auth()->user()->isAdmin())
            <div class="flex h-screen bg-gray-100">
                <!-- Admin Sidebar -->
                @include('components.admin-sidebar')

                <!-- Main Content -->
                <div class="flex-1 flex flex-col overflow-hidden lg:ml-0">
                    <!-- Top Header -->
                    <header class="bg-white shadow-sm lg:hidden">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between">
                                <h1 class="text-2xl font-bold text-gray-900">@yield('title', 'Dashboard')</h1>
                            </div>
                        </div>
                    </header>

                    <!-- Main Content Area -->
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gradient-to-br from-purple-50 via-yellow-50 to-purple-100">
                        <div class="container mx-auto px-6 py-8">
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                                    <div class="flex items-center">
                                        <svg class="icon-fix mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                                    <div class="flex items-center">
                                        <svg class="icon-fix mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        @else
            <div class="flex h-screen bg-gray-100">
                <!-- Murid Sidebar -->
                @include('components.murid-sidebar')

                <!-- Main Content -->
                <div class="flex-1 flex flex-col overflow-hidden lg:ml-0">
                    <!-- Top Header -->
                    <header class="bg-white shadow-sm lg:hidden">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between">
                                <h1 class="text-2xl font-bold text-gray-900">@yield('title', 'Dashboard')</h1>
                            </div>
                        </div>
                    </header>

                    <!-- Main Content Area -->
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gradient-to-br from-yellow-50 via-purple-50 to-yellow-100">
                        <div class="container mx-auto px-6 py-8">
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                                    <div class="flex items-center">
                                        <svg class="icon-fix mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                                    <div class="flex items-center">
                                        <svg class="icon-fix mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        @endif
    @else
        <!-- Guest Layout (Login pages, Welcome page) -->
        <nav class="gradient-purple-yellow text-white p-4 shadow-lg">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold">SMP 54 Surabaya</h1>
                </div>
            </div>
        </nav>

        <main class="container mx-auto py-8 px-4">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                    <div class="flex items-center">
                        <svg class="icon-fix mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                    <div class="flex items-center">
                        <svg class="icon-fix mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="bg-gray-800 text-white text-center py-8 mt-12">
            <p>&copy; 2024 SMP 54 Surabaya. All rights reserved.</p>
            <p class="text-gray-400 text-sm mt-2">Sistem Ekstrakurikuler Digital - Memajukan Pendidikan Indonesia</p>
        </footer>
    @endauth
</body>
</html>
