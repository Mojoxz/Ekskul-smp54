<!-- resources/views/murid/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Murid')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-purple-600">Dashboard Siswa</h1>
            <p class="text-gray-600 mt-2">Selamat datang kembali, {{ auth()->user()->name }}! Mari pantau aktivitas ekstrakurikuler Anda.</p>
        </div>
        <div class="hidden lg:block">
            <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Active Ekstrakurikuler Banner -->
<div class="bg-gradient-to-r from-yellow-500 via-yellow-400 to-purple-500 rounded-2xl shadow-xl mb-8 overflow-hidden">
    <div class="p-8">
        <div class="flex items-center justify-between">
            <div class="text-white">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Ekstrakurikuler Aktif</h3>
                        <p class="text-yellow-100 opacity-90">Kegiatan yang sedang Anda ikuti</p>
                    </div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-xl p-4 backdrop-blur-sm">
                    <h4 class="text-2xl font-bold mb-2">{{ $selectedEkskul->nama }}</h4>
                    <div class="flex items-center space-x-4 text-yellow-100">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $selectedEkskul->hari }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ date('H:i', strtotime($selectedEkskul->jam_mulai)) }} - {{ date('H:i', strtotime($selectedEkskul->jam_selesai)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="w-32 h-32 bg-white bg-opacity-10 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-16 h-16 text-white opacity-80" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Hadir Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-500 to-green-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Hadir</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalHadir }}</p>
                    <p class="text-xs text-green-600 mt-2">Kehadiran tercatat</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Izin Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-yellow-500 to-yellow-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Izin</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalIzin }}</p>
                    <p class="text-xs text-yellow-600 mt-2">Dengan keterangan</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-yellow-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Tidak Hadir Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-500 to-red-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Tidak Hadir</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalTidakHadir }}</p>
                    <p class="text-xs text-red-600 mt-2">Perlu perhatian</p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Menu Cepat</h3>
            <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-purple-500 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>

        <div class="space-y-4">
            <!-- Presensi Button -->
            <a href="{{ route('murid.presensi') }}" class="group flex items-center p-4 bg-gradient-to-r from-yellow-50 to-purple-50 hover:from-yellow-100 hover:to-purple-100 rounded-xl border-2 border-yellow-200 hover:border-yellow-300 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-purple-500 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-lg text-gray-800 group-hover:text-yellow-600 transition-colors">Presensi Hari Ini</h4>
                    <p class="text-sm text-gray-600">Catat kehadiran Anda untuk kegiatan ekstrakurikuler</p>
                </div>
                <div class="ml-4">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-yellow-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </a>

            <!-- Homepage Button -->
            <a href="{{ route('murid.homepage') }}" class="group flex items-center p-4 bg-gradient-to-r from-purple-50 to-yellow-50 hover:from-purple-100 hover:to-yellow-100 rounded-xl border-2 border-purple-200 hover:border-purple-300 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-yellow-500 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-lg text-gray-800 group-hover:text-purple-600 transition-colors">Berita & Informasi</h4>
                    <p class="text-sm text-gray-600">Lihat pengumuman dan berita terbaru sekolah</p>
                </div>
                <div class="ml-4">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>

    <!-- Statistics & Progress -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Statistik Kehadiran</h3>
            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-yellow-500 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                </svg>
            </div>
        </div>

        @php
            $total = $totalHadir + $totalIzin + $totalTidakHadir;
            $hadirPercent = $total > 0 ? round(($totalHadir / $total) * 100) : 0;
            $izinPercent = $total > 0 ? round(($totalIzin / $total) * 100) : 0;
            $tidakHadirPercent = $total > 0 ? round(($totalTidakHadir / $total) * 100) : 0;
        @endphp

        @if($total > 0)
        <div class="space-y-6">
            <!-- Kehadiran Progress -->
            <div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-sm font-medium text-gray-600">Tingkat Kehadiran</span>
                    <span class="text-lg font-bold text-green-600">{{ $hadirPercent }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-green-500 to-green-400 h-3 rounded-full shadow-sm transition-all duration-500" style="width: {{ $hadirPercent }}%"></div>
                </div>
            </div>

            <!-- Detailed Stats -->
            <div class="grid grid-cols-3 gap-4">
                <div class="text-center p-4 bg-green-50 rounded-xl border border-green-200">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-green-600">{{ $totalHadir }}</p>
                    <p class="text-xs text-green-500">Hadir</p>
                </div>

                <div class="text-center p-4 bg-yellow-50 rounded-xl border border-yellow-200">
                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-yellow-600">{{ $totalIzin }}</p>
                    <p class="text-xs text-yellow-500">Izin</p>
                </div>

                <div class="text-center p-4 bg-red-50 rounded-xl border border-red-200">
                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-red-600">{{ $totalTidakHadir }}</p>
                    <p class="text-xs text-red-500">Tidak Hadir</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-yellow-50 to-purple-50 rounded-xl p-4 border border-yellow-200">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-purple-500 rounded-xl flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700">Total Aktivitas Tercatat</p>
                        <p class="text-lg font-bold text-gray-800">{{ $total }} kali kegiatan</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-8">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Data Presensi</h4>
            <p class="text-sm text-gray-500 mb-4">Mulai lakukan presensi untuk melihat statistik kehadiran Anda</p>
            <a href="{{ route('murid.presensi') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-purple-500 text-white font-medium rounded-xl hover:shadow-lg transition-all duration-300">
                Mulai Presensi
                <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
