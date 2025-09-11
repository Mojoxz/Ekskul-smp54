@extends('layouts.app')

@section('title', 'Tentang Kami - SMP 54 Surabaya')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 gradient-purple-yellow text-white">
    <div class="absolute inset-0 opacity-10">
        <img src="{{ asset('images/about-bg.jpg') }}" alt="SMP 54 Surabaya" class="w-full h-full object-cover">
    </div>
    
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-6">Tentang SMP 54 Surabaya</h1>
        <p class="text-xl max-w-3xl mx-auto opacity-90">Mengenal lebih dekat sejarah, visi, misi, dan komitmen kami dalam mencerdaskan anak bangsa</p>
    </div>
</section>

<!-- About Content -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Sejarah Sekolah</h2>
                    <p class="text-gray-600 mb-4 text-justify">
                        SMP Negeri 54 Surabaya didirikan pada tahun 1985 dengan visi menjadi sekolah yang unggul dalam prestasi akademik dan non-akademik. Berlokasi strategis di jantung kota Surabaya, sekolah kami telah menghasilkan ribuan lulusan yang sukses di berbagai bidang.
                    </p>
                    <p class="text-gray-600 mb-4 text-justify">
                        Dengan fasilitas modern dan tenaga pengajar yang berkualitas, kami berkomitmen memberikan pendidikan terbaik untuk generasi penerus bangsa. Sistem ekstrakurikuler digital ini merupakan salah satu inovasi terbaru dalam upaya meningkatkan kualitas layanan pendidikan.
                    </p>
                    <div class="flex items-center space-x-6 mt-8">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">39</div>
                            <div class="text-sm text-gray-500">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">5000+</div>
                            <div class="text-sm text-gray-500">Alumni</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">50+</div>
                            <div class="text-sm text-gray-500">Guru & Staff</div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-purple-100 to-yellow-100 rounded-2xl p-8">
                        <img src="{{ asset('images/school-building.jpg') }}" alt="Gedung SMP 54 Surabaya" class="w-full rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Visi & Misi</h2>
                <p class="text-xl text-gray-600">Komitmen kami dalam mencerdaskan dan membentuk karakter siswa</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Visi -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 gradient-purple-yellow rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Visi</h3>
                    <p class="text-gray-600 leading-relaxed">
                        "Menjadi sekolah yang unggul dalam prestasi, berkarakter mulia, berbudaya lingkungan, dan mampu bersaing di era global dengan tetap berpegang teguh pada nilai-nilai Pancasila dan Bhinneka Tunggal Ika."
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 gradient-yellow-purple rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-target text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Misi</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-3 mt-1"></i>
                            Menyelenggarakan pembelajaran yang berkualitas dan inovatif
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-3 mt-1"></i>
                            Mengembangkan potensi siswa melalui kegiatan ekstrakurikuler
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-3 mt-1"></i>
                            Membentuk karakter siswa yang berakhlak mulia
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-3 mt-1"></i>
                            Menciptakan lingkungan sekolah yang kondusif dan ramah
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Nilai-Nilai Kami</h2>
                <p class="text-xl text-gray-600">Prinsip yang menjadi landasan dalam setiap kegiatan pendidikan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-purple-50 rounded-xl hover:bg-purple-100 transition duration-300">
                    <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Integritas</h3>
                    <p class="text-gray-600 text-sm">Menjunjung tinggi kejujuran dan kebenaran dalam setiap tindakan</p>
                </div>

                <div class="text-center p-6 bg-yellow-50 rounded-xl hover:bg-yellow-100 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Inovasi</h3>
                    <p class="text-gray-600 text-sm">Selalu mencari cara baru untuk meningkatkan kualitas pendidikan</p>
                </div>

                <div class="text-center p-6 bg-green-50 rounded-xl hover:bg-green-100 transition duration-300">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Kerjasama</h3>
                    <p class="text-gray-600 text-sm">Membangun sinergi antara siswa, guru, dan orang tua</p>
                </div>

                <div class="text-center p-6 bg-blue-50 rounded-xl hover:bg-blue-100 transition duration-300">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Prestasi</h3>
                    <p class="text-gray-600 text-sm">Mendorong siswa untuk mencapai yang terbaik dalam setiap bidang</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Fasilitas Sekolah</h2>
                <p class="text-xl text-gray-600">Sarana dan prasarana modern untuk mendukung proses pembelajaran</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-r from-purple-400 to-purple-600 rounded-lg mb-4 flex items-center justify-center">
                        <i class="fas fa-desktop text-white text-4xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Laboratorium Komputer</h3>
                    <p class="text-gray-600 text-sm">Lab komputer dengan perangkat terkini untuk mendukung pembelajaran digital</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-lg mb-4 flex items-center justify-center">
                        <i class="fas fa-flask text-white text-4xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Laboratorium IPA</h3>
                    <p class="text-gray-600 text-sm">Fasilitas lengkap untuk praktikum mata pelajaran sains</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-r from-green-400 to-green-600 rounded-lg mb-4 flex items-center justify-center">
                        <i class="fas fa-book text-white text-4xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Perpustakaan</h3>
                    <p class="text-gray-600 text-sm">Koleksi buku lengkap dan area baca yang nyaman</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg mb-4 flex items-center justify-center">
                        <i class="fas fa-running text-white text-4xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Lapangan Olahraga</h3>
                    <p class="text-gray-600 text-sm">Lapangan basket, voli, dan fasilitas olahraga lainnya</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-r from-red-400 to-red-600 rounded-lg mb-4 flex items-center justify-center">
                        <i class="fas fa-music text-white text-4xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Ruang Seni</h3>
                    <p class="text-gray-600 text-sm">Studio musik dan ruang seni untuk mengembangkan kreativitas</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-r from-indigo-400 to-indigo-600 rounded-lg mb-4 flex items-center justify-center">
                        <i class="fas fa-utensils text-white text-4xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Kantin Sekolah</h3>
                    <p class="text-gray-600 text-sm">Kantin bersih dengan menu makanan sehat dan bergizi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Tim Kepemimpinan</h2>
                <p class="text-xl text-gray-600">Para pemimpin yang berdedikasi untuk kemajuan sekolah</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300 text-center">
                    <div class="w-24 h-24 gradient-purple-yellow rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Drs. Ahmad Suryanto, M.Pd</h3>
                    <p class="text-purple-600 font-semibold mb-2">Kepala Sekolah</p>
                    <p class="text-gray-600 text-sm">Memimpin dengan visi inovatif untuk kemajuan pendidikan</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300 text-center">
                    <div class="w-24 h-24 gradient-yellow-purple rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Dr. Siti Nurlaila, S.Pd</h3>
                    <p class="text-purple-600 font-semibold mb-2">Wakil Kepala Sekolah</p>
                    <p class="text-gray-600 text-sm">Mengkoordinasi program akademik dan ekstrakurikuler</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300 text-center">
                    <div class="w-24 h-24 gradient-purple-yellow rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Dra. Maria Kristina, M.M</h3>
                    <p class="text-purple-600 font-semibold mb-2">Kepala Tata Usaha</p>
                    <p class="text-gray-600 text-sm">Mengelola administrasi dan layanan sekolah</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection