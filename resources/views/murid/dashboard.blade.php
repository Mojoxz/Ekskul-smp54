@extends('layouts.murid')

@section('title', 'Dashboard Siswa')
@section('page-title', 'Dashboard Siswa')
@section('page-subtitle', 'Selamat datang kembali, pantau aktivitas ekstrakurikuler Anda')

@section('content')
<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-cyan-500 via-blue-500 to-blue-600 rounded-2xl shadow-xl mb-8 overflow-hidden">
    <div class="p-8">
        <div class="flex items-center justify-between">
            <div class="text-white">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">Selamat Datang!</h3>
                        <p class="text-cyan-100 opacity-90">{{ auth()->user()->name }}</p>
                    </div>
                </div>
                
                @if(isset($selectedEkskul))
                <div class="bg-white bg-opacity-20 rounded-xl p-4 backdrop-blur-sm">
                    <h4 class="text-xl font-bold mb-2">{{ $selectedEkskul->nama }}</h4>
                    <div class="flex items-center space-x-4 text-cyan-100">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <span>{{ $selectedEkskul->hari }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2"></i>
                            <span>{{ date('H:i', strtotime($selectedEkskul->jam_mulai)) }} - {{ date('H:i', strtotime($selectedEkskul->jam_selesai)) }}</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="hidden md:block">
                <div class="w-32 h-32 bg-white bg-opacity-10 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-user-graduate text-white text-5xl opacity-80"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Hadir Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-500 to-emerald-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Hadir</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalHadir ?? 0 }}</p>
                    <p class="text-xs text-green-600 mt-2 flex items-center">
                        <i class="fas fa-check-circle mr-1"></i>
                        Kehadiran tercatat
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-check text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Izin Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-amber-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Izin</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalIzin ?? 0 }}</p>
                    <p class="text-xs text-yellow-600 mt-2 flex items-center">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Dengan keterangan
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-amber-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tidak Hadir Card -->
    <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-rose-400"></div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Tidak Hadir</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalTidakHadir ?? 0 }}</p>
                    <p class="text-xs text-red-600 mt-2 flex items-center">
                        <i class="fas fa-times-circle mr-1"></i>
                        Perlu perhatian
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-rose-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-times text-white text-xl"></i>
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
            <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-bolt text-white"></i>
            </div>
        </div>

        <div class="space-y-4">
            <!-- Presensi Button -->
            <a href="{{ route('murid.presensi') }}" class="group flex items-center p-4 bg-gradient-to-r from-cyan-50 to-blue-50 hover:from-cyan-100 hover:to-blue-100 rounded-xl border-2 border-cyan-200 hover:border-cyan-300 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-calendar-check text-white"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-lg text-gray-800 group-hover:text-cyan-600 transition-colors">Presensi Hari Ini</h4>
                    <p class="text-sm text-gray-600">Catat kehadiran Anda untuk kegiatan ekstrakurikuler</p>
                </div>
                <div class="ml-4">
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                </div>
            </a>

            <!-- Profile Button -->
            <a href="{{ route('profile.show') }}" class="group flex items-center p-4 bg-gradient-to-r from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 rounded-xl border-2 border-purple-200 hover:border-purple-300 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-user-circle text-white"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-lg text-gray-800 group-hover:text-purple-600 transition-colors">Profil Saya</h4>
                    <p class="text-sm text-gray-600">Kelola informasi dan pengaturan akun Anda</p>
                </div>
                <div class="ml-4">
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-purple-600 transition-colors"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- Statistics & Progress -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Statistik Kehadiran</h3>
            <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-chart-pie text-white"></i>
            </div>
        </div>

        @php
            $total = ($totalHadir ?? 0) + ($totalIzin ?? 0) + ($totalTidakHadir ?? 0);
            $hadirPercent = $total > 0 ? round((($totalHadir ?? 0) / $total) * 100) : 0;
            $izinPercent = $total > 0 ? round((($totalIzin ?? 0) / $total) * 100) : 0;
            $tidakHadirPercent = $total > 0 ? round((($totalTidakHadir ?? 0) / $total) * 100) : 0;
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
                    <div class="bg-gradient-to-r from-green-500 to-emerald-400 h-3 rounded-full shadow-sm transition-all duration-500" style="width: {{ $hadirPercent }}%"></div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    @if($hadirPercent >= 80)
                        <span class="text-green-600">🎉 Tingkat kehadiran sangat baik!</span>
                    @elseif($hadirPercent >= 60)
                        <span class="text-yellow-600">⚠️ Tingkat kehadiran cukup baik</span>
                    @else
                        <span class="text-red-600">📉 Perlu meningkatkan kehadiran</span>
                    @endif
                </div>
            </div>

            <!-- Detailed Stats -->
            <div class="grid grid-cols-3 gap-4">
                <div class="text-center p-4 bg-green-50 rounded-xl border border-green-200 hover:bg-green-100 transition-colors">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-check text-white text-sm"></i>
                    </div>
                    <p class="text-2xl font-bold text-green-600">{{ $totalHadir ?? 0 }}</p>
                    <p class="text-xs text-green-500">Hadir</p>
                </div>

                <div class="text-center p-4 bg-yellow-50 rounded-xl border border-yellow-200 hover:bg-yellow-100 transition-colors">
                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                    </div>
                    <p class="text-2xl font-bold text-yellow-600">{{ $totalIzin ?? 0 }}</p>
                    <p class="text-xs text-yellow-500">Izin</p>
                </div>

                <div class="text-center p-4 bg-red-50 rounded-xl border border-red-200 hover:bg-red-100 transition-colors">
                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-times text-white text-sm"></i>
                    </div>
                    <p class="text-2xl font-bold text-red-600">{{ $totalTidakHadir ?? 0 }}</p>
                    <p class="text-xs text-red-500">Tidak Hadir</p>
                </div>
            </div>

            <!-- Summary Card -->
            <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl p-4 border border-cyan-200">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center mr-3">
                        <i class="fas fa-chart-line text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700">Total Aktivitas Tercatat</p>
                        <p class="text-lg font-bold text-gray-800">{{ $total }} kali kegiatan</p>
                    </div>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-lightbulb text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-blue-800 mb-1">Tips Kehadiran</h4>
                        <p class="text-sm text-blue-700">Usahakan hadir minimal 80% dari total kegiatan untuk mendapatkan sertifikat ekstrakurikuler.</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-8">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-chart-pie text-gray-400 text-2xl"></i>
            </div>
            <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Data Presensi</h4>
            <p class="text-sm text-gray-500 mb-4">Mulai lakukan presensi untuk melihat statistik kehadiran Anda</p>
            <a href="{{ route('murid.presensi') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-medium rounded-xl hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <i class="fas fa-calendar-check mr-2"></i>
                Mulai Presensi
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Today's Schedule (if available) -->
@if(isset($selectedEkskul))
<div class="mt-8 bg-white rounded-2xl shadow-lg p-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Jadwal Hari Ini</h3>
        <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
            <i class="fas fa-calendar-alt text-white"></i>
        </div>
    </div>

    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 border border-indigo-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-users text-white"></i>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-gray-800">{{ $selectedEkskul->nama }}</h4>
                    <div class="flex items-center space-x-4 text-gray-600 mt-1">
                        <span class="flex items-center">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            {{ $selectedEkskul->hari }}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-clock mr-1"></i>
                            {{ date('H:i', strtotime($selectedEkskul->jam_mulai)) }} - {{ date('H:i', strtotime($selectedEkskul->jam_selesai)) }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="text-right">
                @php
                    $today = now()->locale('id');
                    $isToday = strtolower($selectedEkskul->hari) === strtolower($today->translatedFormat('l'));
                @endphp
                @if($isToday)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <i class="fas fa-play mr-1"></i>
                        Hari Ini
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $selectedEkskul->hari }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection