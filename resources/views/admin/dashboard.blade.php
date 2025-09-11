<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-yellow-500">Dashboard Admin</h1>
            <p class="text-gray-600 mt-2">Selamat datang, {{ auth()->user()->name }}! Kelola sistem ekstrakurikuler dengan mudah.</p>
        </div>
        <div class="hidden lg:block">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-yellow-500 rounded-2xl flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Murid Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-blue-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Murid</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalMurid }}</p>
                    <p class="text-xs text-blue-600 mt-2">Siswa aktif</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Ekstrakurikuler Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-purple-500 to-purple-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Ekstrakurikuler</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalEkskul }}</p>
                    <p class="text-xs text-purple-600 mt-2">Kegiatan tersedia</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Presensi Hari Ini Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-yellow-500 to-yellow-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Presensi Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPresensiHariIni }}</p>
                    <p class="text-xs text-yellow-600 mt-2">{{ now()->format('d M Y') }}</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-yellow-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 002 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Berita Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 to-indigo-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Berita</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalBerita }}</p>
                    <p class="text-xs text-indigo-600 mt-2">Artikel dipublikasi</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Menu Administrasi</h2>
        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-yellow-500 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Kelola Murid -->
        <a href="{{ route('admin.murid.index') }}" class="group block p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 hover:from-blue-100 hover:to-blue-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                </div>
                <div class="ml-auto">
                    <svg class="w-5 h-5 text-blue-400 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-blue-800 mb-2">Kelola Murid</h3>
            <p class="text-sm text-blue-600 leading-relaxed">Tambah, edit, dan kelola data siswa serta ekstrakurikuler yang mereka ikuti</p>
        </a>

        <!-- Kelola Ekstrakurikuler -->
        <a href="{{ route('admin.ekskul.index') }}" class="group block p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl border border-purple-200 hover:from-purple-100 hover:to-purple-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                    </svg>
                </div>
                <div class="ml-auto">
                    <svg class="w-5 h-5 text-purple-400 group-hover:text-purple-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-purple-800 mb-2">Kelola Ekstrakurikuler</h3>
            <p class="text-sm text-purple-600 leading-relaxed">Tambah dan kelola berbagai kegiatan ekstrakurikuler beserta jadwalnya</p>
        </a>

        <!-- Rekap Presensi -->
        <a href="{{ route('admin.rekap.presensi') }}" class="group block p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl border border-yellow-200 hover:from-yellow-100 hover:to-yellow-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-auto">
                    <svg class="w-5 h-5 text-yellow-400 group-hover:text-yellow-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-yellow-800 mb-2">Rekap Presensi</h3>
            <p class="text-sm text-yellow-600 leading-relaxed">Lihat dan analisis rekap kehadiran siswa dengan filter yang detail</p>
        </a>

        <!-- Kelola Berita -->
        <a href="{{ route('admin.berita.index') }}" class="group block p-6 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl border border-indigo-200 hover:from-indigo-100 hover:to-indigo-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-auto">
                    <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-indigo-800 mb-2">Kelola Berita</h3>
            <p class="text-sm text-indigo-600 leading-relaxed">Tambah dan kelola berita serta pengumuman untuk siswa</p>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-2xl shadow-lg p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Ringkasan Sistem</h2>
        <div class="flex items-center space-x-2">
            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
            <span class="text-sm text-gray-500">Sistem Aktif</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl border border-green-200">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-400 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-green-800 mb-2">Sistem Presensi</h3>
            <p class="text-sm text-green-600">Berfungsi dengan baik dan siap digunakan oleh siswa</p>
        </div>

        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-400 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-blue-800 mb-2">Database</h3>
            <p class="text-sm text-blue-600">Semua data tersimpan dengan aman dan terorganisir</p>
        </div>

        <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200">
            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-400 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-purple-800 mb-2">Laporan</h3>
            <p class="text-sm text-purple-600">Analisis dan laporan siap diakses kapan saja</p>
        </div>
    </div>
</div>
@endsection
