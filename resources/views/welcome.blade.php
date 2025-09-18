@extends('layouts.app')

@section('title', 'Beranda - SMP 54 Surabaya')

@section('content')
<!-- Hero Carousel Section -->
<section class="relative overflow-hidden h-screen">
    <!-- Carousel Container -->
    <div class="carousel-container relative w-full h-full">
        <!-- Slide 1 -->
        <div class="carousel-slide active absolute inset-0">
            <div class="absolute inset-0 z-0">
                <div class="w-full h-full gradient-purple-yellow opacity-90"></div>
            </div>
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/padding_awal.jpeg') }}" alt="Kegiatan Ekstrakurikuler" class="w-full h-full object-cover opacity-20">
            </div>
            <div class="relative z-10 flex items-center justify-center h-full">
                <div class="text-center text-white px-4 max-w-6xl">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight animate-fade-in">
                        Sistem Presensi
                        <span class="text-yellow-300 floating">Ekstrakurikuler</span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90 animate-slide-up">
                        Platform modern untuk mengelola dan memantau kegiatan ekstrakurikuler dengan mudah, efisien, dan terintegrasi
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-delay">
                        <a href="#features" class="bg-white text-purple-600 font-bold py-4 px-8 rounded-full hover:bg-yellow-100 transform hover:scale-105 transition duration-300 shadow-lg">
                            <i class="fas fa-play mr-2"></i> Jelajahi Fitur
                        </a>
                        <a href="{{ route('berita') }}" class="bg-yellow-500 text-white font-bold py-4 px-8 rounded-full hover:bg-yellow-600 transform hover:scale-105 transition duration-300 shadow-lg">
                            <i class="fas fa-newspaper mr-2"></i> Lihat Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-slide absolute inset-0">
            <div class="absolute inset-0 z-0">
                <div class="w-full h-full bg-gradient-to-r from-blue-600 to-purple-600 opacity-90"></div>
            </div>
            <div class="relative z-10 flex items-center justify-center h-full">
                <div class="text-center text-white px-4 max-w-6xl">
                    <div class="mb-8">
                        <i class="fas fa-users text-8xl text-yellow-300 floating"></i>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                        <span class="text-yellow-300">{{ $ekskuls->count() }}+</span> Ekstrakurikuler
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                        Berbagai pilihan kegiatan untuk mengembangkan bakat dan minat siswa dalam berbagai bidang
                    </p>
                    <a href="{{ route('ekstrakurikuler') }}" class="bg-yellow-500 text-white font-bold py-4 px-8 rounded-full hover:bg-yellow-600 transform hover:scale-105 transition duration-300 shadow-lg">
                        <i class="fas fa-arrow-right mr-2"></i> Lihat Semua Ekstrakurikuler
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-slide absolute inset-0">
            <div class="absolute inset-0 z-0">
                <div class="w-full h-full bg-gradient-to-r from-green-500 to-blue-600 opacity-90"></div>
            </div>
            <div class="relative z-10 flex items-center justify-center h-full">
                <div class="text-center text-white px-4 max-w-6xl">
                    <div class="mb-8">
                        <i class="fas fa-chart-line text-8xl text-yellow-300 floating"></i>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                        Tingkat Kehadiran <span class="text-yellow-300">95%</span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                        Sistem presensi digital yang akurat dan real-time untuk memantau keaktifan siswa
                    </p>
                    <a href="#features" class="bg-yellow-500 text-white font-bold py-4 px-8 rounded-full hover:bg-yellow-600 transform hover:scale-105 transition duration-300 shadow-lg">
                        <i class="fas fa-check-circle mr-2"></i> Pelajari Sistem Presensi
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-slide absolute inset-0">
            <div class="absolute inset-0 z-0">
                <div class="w-full h-full bg-gradient-to-r from-pink-500 to-purple-600 opacity-90"></div>
            </div>
            <div class="relative z-10 flex items-center justify-center h-full">
                <div class="text-center text-white px-4 max-w-6xl">
                    <div class="mb-8">
                        <i class="fas fa-newspaper text-8xl text-yellow-300 floating"></i>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                        <span class="text-yellow-300">{{ $beritas->count() }}+</span> Berita Terkini
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                        Update terbaru tentang kegiatan, prestasi, dan perkembangan ekstrakurikuler sekolah
                    </p>
                    <a href="{{ route('berita') }}" class="bg-yellow-500 text-white font-bold py-4 px-8 rounded-full hover:bg-yellow-600 transform hover:scale-105 transition duration-300 shadow-lg">
                        <i class="fas fa-newspaper mr-2"></i> Baca Berita Terkini
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel Navigation -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
        <div class="flex space-x-3">
            <button class="carousel-dot active w-3 h-3 rounded-full bg-white opacity-60 hover:opacity-100 transition duration-300" data-slide="0"></button>
            <button class="carousel-dot w-3 h-3 rounded-full bg-white opacity-60 hover:opacity-100 transition duration-300" data-slide="1"></button>
            <button class="carousel-dot w-3 h-3 rounded-full bg-white opacity-60 hover:opacity-100 transition duration-300" data-slide="2"></button>
            <button class="carousel-dot w-3 h-3 rounded-full bg-white opacity-60 hover:opacity-100 transition duration-300" data-slide="3"></button>
        </div>
    </div>

    <!-- Carousel Arrow Controls -->
    <button class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 z-20 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full backdrop-blur-sm transition duration-300">
        <i class="fas fa-chevron-left text-xl"></i>
    </button>
    <button class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 z-20 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full backdrop-blur-sm transition duration-300">
        <i class="fas fa-chevron-right text-xl"></i>
    </button>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 text-white animate-bounce z-20">
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
            <div class="text-center transform hover:scale-110 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="{{ $ekskuls->count() }}">0</div>
                <div class="text-lg opacity-90">Ekstrakurikuler</div>
            </div>
            <div class="text-center transform hover:scale-110 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="500">0</div>
                <div class="text-lg opacity-90">Siswa Aktif</div>
            </div>
            <div class="text-center transform hover:scale-110 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="95">0</div>
                <div class="text-lg opacity-90">% Tingkat Kehadiran</div>
            </div>
            <div class="text-center transform hover:scale-110 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="{{ $beritas->count() }}">0</div>
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
                <div class="h-32 relative">
                    @if($ekskul->gambar && file_exists(public_path('storage/' . $ekskul->gambar)))
                        <!-- Tampilkan gambar jika ada -->
                        <img src="{{ asset('storage/' . $ekskul->gambar) }}" 
                             alt="{{ $ekskul->nama }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    @else
                        <!-- Fallback ke gradient dan icon jika tidak ada gambar -->
                        <div class="h-full gradient-purple-yellow flex items-center justify-center">
                            @php
                                $icon = 'fas fa-star'; // default icon
                                $name = strtolower($ekskul->nama);
                                
                                if(str_contains($name, 'basket')) $icon = 'fas fa-basketball-ball';
                                elseif(str_contains($name, 'sepak') || str_contains($name, 'futsal')) $icon = 'fas fa-futbol';
                                elseif(str_contains($name, 'voli')) $icon = 'fas fa-volleyball-ball';
                                elseif(str_contains($name, 'badminton')) $icon = 'fas fa-shuttle';
                                elseif(str_contains($name, 'tenis')) $icon = 'fas fa-table-tennis';
                                elseif(str_contains($name, 'musik') || str_contains($name, 'band')) $icon = 'fas fa-music';
                                elseif(str_contains($name, 'tari') || str_contains($name, 'dance')) $icon = 'fas fa-music';
                                elseif(str_contains($name, 'drama') || str_contains($name, 'teater')) $icon = 'fas fa-theater-masks';
                                elseif(str_contains($name, 'lukis') || str_contains($name, 'seni')) $icon = 'fas fa-palette';
                                elseif(str_contains($name, 'english') || str_contains($name, 'bahasa')) $icon = 'fas fa-language';
                                elseif(str_contains($name, 'komputer') || str_contains($name, 'programming')) $icon = 'fas fa-laptop-code';
                                elseif(str_contains($name, 'science') || str_contains($name, 'sains')) $icon = 'fas fa-flask';
                                elseif(str_contains($name, 'math') || str_contains($name, 'matematika')) $icon = 'fas fa-calculator';
                                elseif(str_contains($name, 'debat')) $icon = 'fas fa-comments';
                                elseif(str_contains($name, 'pramuka')) $icon = 'fas fa-campground';
                                elseif(str_contains($name, 'pmr')) $icon = 'fas fa-plus';
                                elseif(str_contains($name, 'rohis') || str_contains($name, 'agama')) $icon = 'fas fa-pray';
                            @endphp
                            
                            <i class="{{ $icon }} text-white text-3xl"></i>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $ekskul->nama }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($ekskul->deskripsi ?: 'Kegiatan ekstrakurikuler yang mengembangkan bakat dan minat siswa.', 80) }}</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-clock mr-1"></i>
                        {{ $ekskul->jam_mulai ? $ekskul->jam_mulai->format('H:i') : '00:00' }} - {{ $ekskul->jam_selesai ? $ekskul->jam_selesai->format('H:i') : '00:00' }}
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mt-1">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $ekskul->hari ?: 'Setiap Hari' }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('ekstrakurikuler') }}" class="gradient-purple-yellow text-white font-bold py-3 px-8 rounded-full hover:shadow-lg transform hover:scale-105 transition duration-300">
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
            <a href="{{ route('berita') }}" class="gradient-purple-yellow text-white font-bold py-3 px-8 rounded-full hover:shadow-lg transform hover:scale-105 transition duration-300">
                <i class="fas fa-newspaper mr-2"></i> Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Additional Features Section -->
<section class="py-20 bg-gradient-to-br from-purple-100 to-yellow-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Mengapa Memilih Kami?</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Keunggulan sistem ekstrakurikuler digital SMP 54 Surabaya</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-mobile-alt text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800">Akses Mobile Friendly</h3>
                        <p class="text-gray-600">Dapat diakses kapan saja dan dimana saja melalui smartphone atau tablet dengan tampilan yang responsif.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-shield-alt text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800">Keamanan Data Terjamin</h3>
                        <p class="text-gray-600">Sistem keamanan berlapis untuk melindungi data siswa dan informasi sekolah dengan teknologi enkripsi terbaru.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-sync text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800">Update Real-time</h3>
                        <p class="text-gray-600">Informasi presensi, pengumuman, dan berita diupdate secara real-time untuk kemudahan monitoring.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-headset text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800">Support 24/7</h3>
                        <p class="text-gray-600">Tim support yang siap membantu mengatasi kendala teknis dan memberikan bantuan penggunaan sistem.</p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <div class="bg-white rounded-2xl shadow-2xl p-8 transform hover:scale-105 transition duration-300">
                    <div class="w-32 h-32 gradient-purple-yellow rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-graduation-cap text-white text-5xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">SMP 54 Surabaya</h3>
                    <p class="text-gray-600 mb-6">Memajukan pendidikan melalui teknologi digital yang inovatif dan berkelanjutan.</p>
                    <a href="{{ route('tentang') }}" class="gradient-purple-yellow text-white font-bold py-3 px-6 rounded-full hover:shadow-lg transform hover:scale-105 transition duration-300">
                        <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Carousel Styles */
.carousel-slide {
    opacity: 0;
    transition: opacity 0.8s ease-in-out;
}

.carousel-slide.active {
    opacity: 1;
}

.carousel-dot.active {
    opacity: 1;
    background-color: #F59E0B;
    transform: scale(1.2);
}

/* Animation Styles */
@keyframes fade-in {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slide-up {
    from { opacity: 0; transform: translateY(50px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fade-in-delay {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fade-in 1s ease-out;
}

.animate-slide-up {
    animation: slide-up 1s ease-out 0.3s both;
}

.animate-fade-in-delay {
    animation: fade-in-delay 1s ease-out 0.6s both;
}

/* Line clamp utilities */
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

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Counter animation */
@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.counter {
    animation: countUp 0.8s ease-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carousel functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const totalSlides = slides.length;

    function showSlide(index) {
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        // Add active class to current slide and dot
        slides[index].classList.add('active');
        dots[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    // Auto-slide every 5 seconds
    setInterval(nextSlide, 5000);

    // Navigation controls
    document.querySelector('.carousel-next').addEventListener('click', nextSlide);
    document.querySelector('.carousel-prev').addEventListener('click', prevSlide);

    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Counter animation for statistics
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.target);
            const increment = target / 100; // Adjust speed here
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.floor(current);
                    setTimeout(updateCounter, 20);
                } else {
                    counter.textContent = target;
                }
            };
            
            // Trigger animation when element is in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(counter);
        });
    }

    // Initialize counter animation
    animateCounters();
});
</script>
@endsection