<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP 54 Surabaya - Sistem Ekstrakurikuler</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-purple-yellow {
            background: linear-gradient(135deg, #8B5CF6 0%, #F59E0B 100%);
        }
        .gradient-yellow-purple {
            background: linear-gradient(135deg, #F59E0B 0%, #8B5CF6 100%);
        }
        .carousel-item {
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.5s ease-in-out;
        }
        .carousel-item.active {
            opacity: 1;
            transform: translateX(0);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 via-yellow-50 to-purple-100 min-h-screen">
    <!-- Header -->
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

    <!-- Hero Section with Carousel -->
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-transparent bg-clip-text gradient-purple-yellow mb-4">
                Sistem Ekstrakurikuler Digital
            </h1>
            <p class="text-xl text-gray-700 mb-8">
                Platform modern untuk mengelola dan memantau kegiatan ekstrakurikuler dengan mudah
            </p>
        </div>

        <!-- Carousel Container -->
        <div class="relative max-w-6xl mx-auto mb-12">
            <div class="overflow-hidden">
                <!-- Carousel Item 1 -->
                <div class="carousel-item active flex items-center">
                    <div class="w-full md:w-1/2 p-8">
                        <div class="gradient-purple-yellow text-white p-8 rounded-2xl shadow-2xl">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold">Untuk Administrator</h3>
                            </div>
                            <ul class="space-y-3 text-lg">
                                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>Kelola data murid dan ekstrakurikuler</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>Monitor presensi real-time</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>Buat laporan komprehensif</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>Kelola berita dan pengumuman</li>
                            </ul>
                            <div class="mt-8">
                                <a href="/admin/login" class="bg-white text-purple-600 font-bold py-3 px-8 rounded-full hover:bg-yellow-100 transition duration-300 shadow-lg">
                                    Login Admin
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block w-1/2 p-8">
                        <div class="floating">
                            <svg class="w-80 h-80 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Carousel Item 2 -->
                <div class="carousel-item absolute top-0 left-0 w-full flex items-center">
                    <div class="hidden md:block w-1/2 p-8">
                        <div class="floating">
                            <svg class="w-80 h-80 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-8">
                        <div class="gradient-yellow-purple text-white p-8 rounded-2xl shadow-2xl">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold">Untuk Siswa</h3>
                            </div>
                            <ul class="space-y-3 text-lg">
                                <li class="flex items-center"><span class="w-2 h-2 bg-purple-300 rounded-full mr-3"></span>Presensi mudah dan cepat</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-purple-300 rounded-full mr-3"></span>Lihat statistik kehadiran</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-purple-300 rounded-full mr-3"></span>Akses berita terkini</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-purple-300 rounded-full mr-3"></span>Dashboard personal</li>
                            </ul>
                            <div class="mt-8">
                                <a href="/murid/login" class="bg-white text-yellow-600 font-bold py-3 px-8 rounded-full hover:bg-purple-100 transition duration-300 shadow-lg">
                                    Login Siswa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Item 3 -->
                <div class="carousel-item absolute top-0 left-0 w-full flex items-center">
                    <div class="w-full md:w-1/2 p-8">
                        <div class="bg-white p-8 rounded-2xl shadow-2xl border-4 border-purple-200">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Fitur Lengkap</h3>
                            </div>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li class="flex items-center"><span class="w-2 h-2 bg-purple-500 rounded-full mr-3"></span>Sistem presensi digital</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></span>Laporan otomatis</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-purple-500 rounded-full mr-3"></span>Notifikasi real-time</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></span>Interface user-friendly</li>
                            </ul>
                            <div class="mt-8 grid grid-cols-2 gap-4">
                                <a href="/admin/login" class="gradient-purple-yellow text-white font-bold py-2 px-4 rounded-full text-center hover:shadow-lg transition duration-300">
                                    Admin
                                </a>
                                <a href="/murid/login" class="gradient-yellow-purple text-white font-bold py-2 px-4 rounded-full text-center hover:shadow-lg transition duration-300">
                                    Siswa
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block w-1/2 p-8">
                        <div class="floating">
                            <svg class="w-80 h-80 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Navigation -->
            <div class="flex justify-center mt-8 space-x-2">
                <button class="carousel-dot w-3 h-3 bg-purple-500 rounded-full transition-all duration-300" data-slide="0"></button>
                <button class="carousel-dot w-3 h-3 bg-gray-300 rounded-full transition-all duration-300" data-slide="1"></button>
                <button class="carousel-dot w-3 h-3 bg-gray-300 rounded-full transition-all duration-300" data-slide="2"></button>
            </div>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-purple-500 hover:shadow-xl transition duration-300">
                <div class="w-16 h-16 gradient-purple-yellow rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4 text-center text-gray-800">Presensi Digital</h3>
                <p class="text-gray-600 text-center">Sistem presensi modern yang memungkinkan pencatatan kehadiran secara digital dengan akurasi tinggi dan kemudahan akses.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-yellow-500 hover:shadow-xl transition duration-300">
                <div class="w-16 h-16 gradient-yellow-purple rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4 text-center text-gray-800">Laporan Otomatis</h3>
                <p class="text-gray-600 text-center">Dapatkan laporan kehadiran dan statistik secara otomatis dengan visual yang menarik dan mudah dipahami.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-purple-500 hover:shadow-xl transition duration-300">
                <div class="w-16 h-16 gradient-purple-yellow rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4 text-center text-gray-800">User Friendly</h3>
                <p class="text-gray-600 text-center">Interface yang intuitif dan mudah digunakan untuk semua kalangan, baik admin maupun siswa.</p>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="gradient-purple-yellow rounded-2xl p-12 text-center text-white shadow-2xl">
            <h2 class="text-3xl font-bold mb-4">Siap Memulai?</h2>
            <p class="text-xl mb-8 opacity-90">Bergabunglah dengan sistem ekstrakurikuler digital yang modern dan efisien</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/admin/login" class="bg-white text-purple-600 font-bold py-4 px-8 rounded-full hover:bg-yellow-100 transition duration-300 shadow-lg">
                    Masuk Sebagai Admin
                </a>
                <a href="/murid/login" class="bg-yellow-500 text-white font-bold py-4 px-8 rounded-full hover:bg-yellow-600 transition duration-300 shadow-lg">
                    Masuk Sebagai Siswa
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-8 mt-12">
        <p>&copy; 2024 SMP 54 Surabaya. All rights reserved.</p>
        <p class="text-gray-400 text-sm mt-2">Sistem Ekstrakurikuler Digital - Memajukan Pendidikan Indonesia</p>
    </footer>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('.carousel-dot');

        function showSlide(n) {
            slides[currentSlide].classList.remove('active');
            dots[currentSlide].classList.remove('bg-purple-500');
            dots[currentSlide].classList.add('bg-gray-300');

            currentSlide = n;

            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.remove('bg-gray-300');
            dots[currentSlide].classList.add('bg-purple-500');
        }

        // Auto-advance carousel
        setInterval(() => {
            showSlide((currentSlide + 1) % slides.length);
        }, 5000);

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });
    </script>
</body>
</html>
