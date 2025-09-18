@extends('layouts.app')

@section('title', 'Beranda - SMP 54 Surabaya')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full gradient-purple-yellow opacity-90"></div>
    </div>
    
    <!-- Background Image Container -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/padding_awal.jpeg') }}" alt="" class="w-full h-full object-cover opacity-20">
    </div>
    
    <div class="relative z-10 container mx-auto px-4 py-20">
        <div class="text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Sistem Presensi Ekstrakurikuler
                <span class="text-yellow-300">Digital</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                Platform modern untuk mengelola dan memantau kegiatan ekstrakurikuler dengan mudah, efisien, dan terintegrasi
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#features" class="bg-white text-purple-600 font-bold py-4 px-8 rounded-full hover:bg-yellow-100 transition duration-300 shadow-lg">
                    <i class="fas fa-play mr-2"></i> Jelajahi Fitur
                </a>
                <a href="{{ route('berita') }}" class="bg-yellow-500 text-white font-bold py-4 px-8 rounded-full hover:bg-yellow-600 transition duration-300 shadow-lg">
                    <i class="fas fa-newspaper mr-2"></i> Lihat Berita
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Fitur Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Sistem yang dirancang khusus untuk memudahkan pengelolaan ekstrakurikuler sekolah</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-purple-500 hover:shadow-xl hover:scale-105 transition duration-300">
                <div class="w-16 h-16 gradient-purple-yellow rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-xl mb-4 text-center text-gray-800">Presensi Digital</h3>
                <p class="text-gray-600 text-center">Sistem presensi modern yang memungkinkan pencatatan kehadiran secara digital dengan akurasi tinggi dan kemudahan akses.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-yellow-500 hover:shadow-xl hover:scale-105 transition duration-300">
                <div class="w-16 h-16 gradient-yellow-purple rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-chart-bar text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-xl mb-4 text-center text-gray-800">Laporan Otomatis</h3>
                <p class="text-gray-600 text-center">Dapatkan laporan kehadiran dan statistik secara otomatis dengan visual yang menarik dan mudah dipahami.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-purple-500 hover:shadow-xl hover:scale-105 transition duration-300">
                <div class="w-16 h-16 gradient-purple-yellow rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-xl mb-4 text-center text-gray-800">User Friendly</h3>
                <p class="text-gray-600 text-center">Interface yang intuitif dan mudah digunakan untuk semua kalangan, baik admin maupun siswa.</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Pencapaian Kami</h2>
            <p class="text-xl opacity-90">Data statistik sistem ekstrakurikuler SMP 54 Surabaya</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">{{ $ekskuls->count() }}+</div>
                <div class="text-lg opacity-90">Ekstrakurikuler</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">500+</div>
                <div class="text-lg opacity-90">Siswa Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">95%</div>
                <div class="text-lg opacity-90">Tingkat Kehadiran</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">{{ $beritas->count() }}+</div>
                <div class="text-lg opacity-90">Berita Terkini</div>
            </div>
        </div>
    </div>
</section>

<!-- Ekstrakurikuler Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Ekstrakurikuler Kami</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Berbagai pilihan ekstrakurikuler yang dapat mengembangkan bakat dan minat siswa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($ekskuls->take(4) as $ekskul)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
                <div class="h-32 gradient-purple-yellow flex items-center justify-center">
                    <i class="fas fa-star text-white text-3xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $ekskul->nama }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($ekskul->deskripsi, 80) }}</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-clock mr-1"></i>
                        {{ $ekskul->jam_mulai->format('H:i') }} - {{ $ekskul->jam_selesai->format('H:i') }}
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mt-1">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $ekskul->hari }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('ekstrakurikuler') }}" class="gradient-purple-yellow text-white font-bold py-3 px-8 rounded-full hover:shadow-lg transition duration-300">
                <i class="fas fa-arrow-right mr-2"></i> Lihat Semua Ekstrakurikuler
            </a>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Berita Terkini</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Informasi terbaru seputar kegiatan ekstrakurikuler dan prestasi siswa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($beritas->take(6) as $berita)
            <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
                <div class="h-48 overflow-hidden">
                    @if($berita->foto)
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                    @else
                        <div class="h-full gradient-purple-yellow flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-4xl"></i>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $berita->created_at->format('d M Y') }}
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-1"></i>
                        {{ $berita->user->name }}
                    </div>
                    <h3 class="font-bold text-lg mb-3 text-gray-800 line-clamp-2">{{ $berita->judul }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                    <a href="{{ route('berita.detail', $berita->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold transition duration-300">
                        <i class="fas fa-arrow-right mr-1"></i> Baca Selengkapnya
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('berita') }}" class="gradient-purple-yellow text-white font-bold py-3 px-8 rounded-full hover:shadow-lg transition duration-300">
                <i class="fas fa-newspaper mr-2"></i> Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold mb-6">Bergabunglah dengan Sistem Kami</h2>
            <p class="text-xl mb-8 opacity-90">Nikmati kemudahan mengelola dan memantau kegiatan ekstrakurikuler dengan teknologi terdepan</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto">
                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6 hover:bg-opacity-30 transition duration-300">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-shield text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Untuk Administrator</h3>
                    <p class="mb-4 opacity-90">Kelola semua aspek ekstrakurikuler dengan mudah dan efisien</p>
                    <a href="{{ route('admin.login') }}" class="bg-white text-purple-600 font-bold py-2 px-6 rounded-full hover:bg-yellow-100 transition duration-300 inline-block">
                        Login Admin
                    </a>
                </div>

                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6 hover:bg-opacity-30 transition duration-300">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-graduate text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Untuk Siswa</h3>
                    <p class="mb-4 opacity-90">Akses presensi dan informasi ekstrakurikuler dengan praktis</p>
                    <a href="{{ route('murid.login') }}" class="bg-white text-purple-600 font-bold py-2 px-6 rounded-full hover:bg-yellow-100 transition duration-300 inline-block">
                        Login Siswa
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

html {
    scroll-behavior: smooth;
}
</style>
@endsection