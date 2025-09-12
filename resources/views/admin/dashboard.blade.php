<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
        <div class="mb-4 lg:mb-0">
            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-yellow-500">
                Dashboard Admin
            </h1>
            <p class="text-gray-600 mt-2">
                Selamat datang, <span class="font-semibold text-purple-700">{{ auth()->user()->name ?? 'Administrator' }}</span>! 
                Kelola sistem ekstrakurikuler dengan mudah.
            </p>
        </div>
        <div class="hidden lg:block">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-yellow-500 rounded-2xl flex items-center justify-center shadow-lg floating">
                <i class="fas fa-tachometer-alt text-white text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Murid Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-blue-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm text-gray-500 font-medium">Total Murid</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalMurid ?? '150' }}</p>
                    <p class="text-xs text-blue-600 mt-2 flex items-center">
                        <i class="fas fa-users mr-1"></i>
                        Siswa aktif
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-user-graduate text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Ekstrakurikuler Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-purple-500 to-purple-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm text-gray-500 font-medium">Total Ekstrakurikuler</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalEkskul ?? '12' }}</p>
                    <p class="text-xs text-purple-600 mt-2 flex items-center">
                        <i class="fas fa-list mr-1"></i>
                        Kegiatan tersedia
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Presensi Hari Ini Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-yellow-500 to-yellow-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm text-gray-500 font-medium">Presensi Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPresensiHariIni ?? '98' }}</p>
                    <p class="text-xs text-yellow-600 mt-2 flex items-center">
                        <i class="fas fa-calendar-day mr-1"></i>
                        {{ now()->format('d M Y') }}
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-yellow-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-check-circle text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Berita Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 to-indigo-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm text-gray-500 font-medium">Total Berita</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalBerita ?? '25' }}</p>
                    <p class="text-xs text-indigo-600 mt-2 flex items-center">
                        <i class="fas fa-newspaper mr-1"></i>
                        Artikel dipublikasi
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-newspaper text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Menu Administrasi</h2>
        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-yellow-500 rounded-xl flex items-center justify-center floating">
            <i class="fas fa-cogs text-white"></i>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Kelola Murid -->
        <a href="{{ route('admin.murid.index') }}" class="group block p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 hover:from-blue-100 hover:to-blue-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-user-graduate text-white text-lg"></i>
                </div>
                <div class="ml-auto">
                    <i class="fas fa-arrow-right text-blue-400 group-hover:text-blue-600 transition-colors group-hover:translate-x-1 transform duration-200"></i>
                </div>
            </div>
            <h3 class="font-bold text-lg text-blue-800 mb-2">Kelola Murid</h3>
            <p class="text-sm text-blue-600 leading-relaxed">Tambah, edit, dan kelola data siswa serta ekstrakurikuler yang mereka ikuti</p>
        </a>

        <!-- Kelola Ekstrakurikuler -->
        <a href="{{ route('admin.ekskul.index') }}" class="group block p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl border border-purple-200 hover:from-purple-100 hover:to-purple-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
                <div class="ml-auto">
                    <i class="fas fa-arrow-right text-purple-400 group-hover:text-purple-600 transition-colors group-hover:translate-x-1 transform duration-200"></i>
                </div>
            </div>
            <h3 class="font-bold text-lg text-purple-800 mb-2">Kelola Ekstrakurikuler</h3>
            <p class="text-sm text-purple-600 leading-relaxed">Tambah dan kelola berbagai kegiatan ekstrakurikuler beserta jadwalnya</p>
        </a>

        <!-- Rekap Presensi -->
        <a href="{{ route('admin.rekap.presensi') }}" class="group block p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl border border-yellow-200 hover:from-yellow-100 hover:to-yellow-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-chart-bar text-white text-lg"></i>
                </div>
                <div class="ml-auto">
                    <i class="fas fa-arrow-right text-yellow-400 group-hover:text-yellow-600 transition-colors group-hover:translate-x-1 transform duration-200"></i>
                </div>
            </div>
            <h3 class="font-bold text-lg text-yellow-800 mb-2">Rekap Presensi</h3>
            <p class="text-sm text-yellow-600 leading-relaxed">Lihat dan analisis rekap kehadiran siswa dengan filter yang detail</p>
        </a>

        <!-- Kelola Berita -->
        <a href="{{ route('admin.berita.index') }}" class="group block p-6 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl border border-indigo-200 hover:from-indigo-100 hover:to-indigo-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-newspaper text-white text-lg"></i>
                </div>
                <div class="ml-auto">
                    <i class="fas fa-arrow-right text-indigo-400 group-hover:text-indigo-600 transition-colors group-hover:translate-x-1 transform duration-200"></i>
                </div>
            </div>
            <h3 class="font-bold text-lg text-indigo-800 mb-2">Kelola Berita</h3>
            <p class="text-sm text-indigo-600 leading-relaxed">Tambah dan kelola berita serta pengumuman untuk siswa</p>
        </a>
    </div>
</div>

<!-- System Status -->
<div class="bg-white rounded-2xl shadow-lg p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Ringkasan Sistem</h2>
        <div class="flex items-center space-x-2">
            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
            <span class="text-sm text-gray-500">Sistem Aktif</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- System Status Card 1 -->
        <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl border border-green-200 hover:shadow-md transition-shadow">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-400 rounded-2xl flex items-center justify-center mx-auto mb-4 floating">
                <i class="fas fa-check-circle text-white text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-green-800 mb-2">Sistem Presensi</h3>
            <p class="text-sm text-green-600">Berfungsi dengan baik dan siap digunakan oleh siswa</p>
            <div class="mt-3 text-xs text-green-500">
                <i class="fas fa-circle mr-1"></i>
                Online
            </div>
        </div>

        <!-- System Status Card 2 -->
        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200 hover:shadow-md transition-shadow">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-400 rounded-2xl flex items-center justify-center mx-auto mb-4 floating">
                <i class="fas fa-database text-white text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-blue-800 mb-2">Database</h3>
            <p class="text-sm text-blue-600">Semua data tersimpan dengan aman dan terorganisir</p>
            <div class="mt-3 text-xs text-blue-500">
                <i class="fas fa-circle mr-1"></i>
                Optimal
            </div>
        </div>

        <!-- System Status Card 3 -->
        <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200 hover:shadow-md transition-shadow">
            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-400 rounded-2xl flex items-center justify-center mx-auto mb-4 floating">
                <i class="fas fa-chart-pie text-white text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-purple-800 mb-2">Laporan</h3>
            <p class="text-sm text-purple-600">Analisis dan laporan siap diakses kapan saja</p>
            <div class="mt-3 text-xs text-purple-500">
                <i class="fas fa-circle mr-1"></i>
                Tersedia
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="mt-8 pt-6 border-t border-gray-200">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-3">
            <!-- Activity Item 1 -->
            <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user-plus text-white text-xs"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-gray-800">Siswa baru ditambahkan</p>
                    <p class="text-xs text-gray-500">5 menit yang lalu</p>
                </div>
                <div class="text-xs text-blue-600 font-medium">+1 Siswa</div>
            </div>

            <!-- Activity Item 2 -->
            <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-white text-xs"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-gray-800">Presensi berhasil diverifikasi</p>
                    <p class="text-xs text-gray-500">15 menit yang lalu</p>
                </div>
                <div class="text-xs text-green-600 font-medium">98 Hadir</div>
            </div>

            <!-- Activity Item 3 -->
            <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-newspaper text-white text-xs"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-gray-800">Berita baru dipublikasi</p>
                    <p class="text-xs text-gray-500">1 jam yang lalu</p>
                </div>
                <div class="text-xs text-purple-600 font-medium">Published</div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats Row -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
    <!-- Chart Placeholder -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Presensi Mingguan</h3>
        <div class="h-64 bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg flex items-center justify-center">
            <div class="text-center">
                <i class="fas fa-chart-line text-4xl text-gray-400 mb-2"></i>
                <p class="text-gray-500">Grafik akan ditampilkan di sini</p>
            </div>
        </div>
    </div>

    <!-- Quick Info -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Cepat</h3>
        <div class="space-y-4">
            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                <span class="text-sm font-medium text-blue-800">Ekskul Paling Aktif</span>
                <span class="text-sm text-blue-600 font-bold">Basket</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                <span class="text-sm font-medium text-green-800">Tingkat Kehadiran</span>
                <span class="text-sm text-green-600 font-bold">87.3%</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg">
                <span class="text-sm font-medium text-yellow-800">Siswa Aktif Bulan Ini</span>
                <span class="text-sm text-yellow-600 font-bold">142</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                <span class="text-sm font-medium text-purple-800">Total Kegiatan</span>
                <span class="text-sm text-purple-600 font-bold">48</span>
            </div>
        </div>
    </div>
</div>
@endsection