@extends('layouts.murid')

@section('title', 'Berita & Informasi')
@section('page-title', 'Berita & Informasi')
@section('page-subtitle', 'Informasi dan berita terkini seputar kegiatan ekstrakurikuler')

@section('content')
<!-- Quick Info Banner -->
<div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-2xl p-6 mb-8 shadow-xl">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-indigo-100 mb-1">{{ auth()->user()->kelas ?? 'Siswa SMP 54 Surabaya' }}</p>
            <p class="text-indigo-100 flex items-center">
                <i class="fas fa-calendar-check mr-2"></i>
                Jangan lupa untuk melakukan presensi hari ini!
            </p>
        </div>
        <div class="hidden md:block">
            <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-newspaper text-white text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Navigation Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <a href="{{ route('murid.dashboard') }}" class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 hover:-translate-y-1">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                <i class="fas fa-tachometer-alt text-white"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-800 group-hover:text-cyan-600 transition-colors">Dashboard</h3>
                <p class="text-sm text-gray-600">Lihat statistik dan aktivitas Anda</p>
            </div>
        </div>
    </a>

    <a href="{{ route('murid.presensi') }}" class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 hover:-translate-y-1">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                <i class="fas fa-calendar-check text-white"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-800 group-hover:text-green-600 transition-colors">Presensi</h3>
                <p class="text-sm text-gray-600">Lakukan presensi kehadiran</p>
            </div>
        </div>
    </a>
</div>

<!-- News Section -->
<div class="mb-8">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3">
                <i class="fas fa-newspaper text-white"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Berita & Pengumuman</h2>
                <p class="text-sm text-gray-600">Informasi terbaru dari sekolah</p>
            </div>
        </div>
        @if(isset($beritas) && $beritas->count() > 0)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                <i class="fas fa-newspaper mr-1"></i>
                {{ $beritas->count() }} berita
            </span>
        @endif
    </div>

    @if(isset($beritas) && $beritas->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($beritas as $berita)
        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            @if($berita->foto)
            <div class="h-48 bg-gray-200 overflow-hidden">
                <img src="{{ asset('storage/' . $berita->foto) }}"
                     alt="{{ $berita->judul }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            @else
            <div class="h-48 bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center">
                <i class="fas fa-image text-white text-4xl opacity-60"></i>
            </div>
            @endif

            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $berita->created_at->format('d M Y') }}
                    </span>
                </div>
                
                <h3 class="font-bold text-lg text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                    {{ $berita->judul }}
                </h3>
                
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                    {{ Str::limit(strip_tags($berita->konten), 120) }}
                </p>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <div class="flex items-center text-xs text-gray-500">
                        <i class="fas fa-user-circle mr-1"></i>
                        <span>{{ $berita->user->name ?? 'Admin' }}</span>
                    </div>
                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center transition-colors">
                        Baca selengkapnya
                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
        <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-newspaper text-gray-400 text-2xl"></i>
        </div>
        <h3 class="text-xl font-medium text-gray-900 mb-2">Belum Ada Berita</h3>
        <p class="text-gray-500 mb-6">Berita dan pengumuman akan ditampilkan di sini ketika tersedia.</p>
        <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition-colors">
            <i class="fas fa-refresh mr-2"></i>
            Muat Ulang
        </button>
    </div>
    @endif
</div>

<!-- Information & Quick Links -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Information Panel -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Informasi Penting</h3>
            <div class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center">
                <i class="fas fa-info-circle text-white text-sm"></i>
            </div>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-start group">
                <div class="flex-shrink-0">
                    <div class="w-3 h-3 bg-blue-500 rounded-full mt-2 group-hover:bg-blue-600 transition-colors"></div>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-700 leading-relaxed">
                        <strong>Presensi Wajib:</strong> Lakukan presensi setiap mengikuti kegiatan ekstrakurikuler untuk mencatat kehadiran Anda.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start group">
                <div class="flex-shrink-0">
                    <div class="w-3 h-3 bg-green-500 rounded-full mt-2 group-hover:bg-green-600 transition-colors"></div>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-700 leading-relaxed">
                        <strong>Pantau Statistik:</strong> Cek dashboard secara berkala untuk melihat statistik kehadiran dan perkembangan Anda.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start group">
                <div class="flex-shrink-0">
                    <div class="w-3 h-3 bg-purple-500 rounded-full mt-2 group-hover:bg-purple-600 transition-colors"></div>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-700 leading-relaxed">
                        <strong>Sertifikat:</strong> Kehadiran minimal 80% diperlukan untuk mendapatkan sertifikat ekstrakurikuler.
                    </p>
                </div>
            </div>
            
            <div class="flex items-start group">
                <div class="flex-shrink-0">
                    <div class="w-3 h-3 bg-red-500 rounded-full mt-2 group-hover:bg-red-600 transition-colors"></div>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-700 leading-relaxed">
                        <strong>Bantuan Teknis:</strong> Hubungi pembimbing atau admin jika mengalami kendala dalam sistem.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Panel -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Aksi Cepat</h3>
            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center">
                <i class="fas fa-bolt text-white text-sm"></i>
            </div>
        </div>
        
        <div class="space-y-3">
            <a href="{{ route('murid.dashboard') }}" 
               class="flex items-center p-4 bg-gradient-to-r from-cyan-50 to-blue-50 hover:from-cyan-100 hover:to-blue-100 rounded-xl transition-all duration-200 group hover:-translate-y-0.5">
                <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg flex items-center justify-center text-white mr-4 group-hover:scale-105 transition-transform">
                    <i class="fas fa-tachometer-alt text-sm"></i>
                </div>
                <div>
                    <span class="text-sm font-medium text-gray-800 group-hover:text-cyan-600 transition-colors">Dashboard</span>
                    <p class="text-xs text-gray-600">Lihat ringkasan aktivitas</p>
                </div>
            </a>

            <a href="{{ route('murid.presensi') }}" 
               class="flex items-center p-4 bg-gradient-to-r from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 rounded-xl transition-all duration-200 group hover:-translate-y-0.5">
                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center text-white mr-4 group-hover:scale-105 transition-transform">
                    <i class="fas fa-calendar-check text-sm"></i>
                </div>
                <div>
                    <span class="text-sm font-medium text-gray-800 group-hover:text-green-600 transition-colors">Presensi</span>
                    <p class="text-xs text-gray-600">Catat kehadiran hari ini</p>
                </div>
            </a>

            <a href="{{ route('profile.show') }}" 
               class="flex items-center p-4 bg-gradient-to-r from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 rounded-xl transition-all duration-200 group hover:-translate-y-0.5">
                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg flex items-center justify-center text-white mr-4 group-hover:scale-105 transition-transform">
                    <i class="fas fa-user-circle text-sm"></i>
                </div>
                <div>
                    <span class="text-sm font-medium text-gray-800 group-hover:text-purple-600 transition-colors">Profil</span>
                    <p class="text-xs text-gray-600">Kelola akun Anda</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection