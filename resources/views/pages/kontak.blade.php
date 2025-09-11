@extends('layouts.app')

@section('title', 'Kontak - SMP 54 Surabaya')

@section('content')
<!-- Hero Section -->
<section class="py-20 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-6">Hubungi Kami</h1>
        <p class="text-xl max-w-3xl mx-auto opacity-90">Kami siap membantu Anda dengan pertanyaan atau informasi yang dibutuhkan</p>
    </div>
</section>

<!-- Contact Info -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="nama@email.com">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">No. Telepon</label>
                                <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="08xxxxxxxxx">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Subjek</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    <option value="">Pilih subjek</option>
                                    <option value="informasi">Informasi Umum</option>
                                    <option value="pendaftaran">Pendaftaran Siswa</option>
                                    <option value="ekstrakurikuler">Ekstrakurikuler</option>
                                    <option value="teknis">Bantuan Teknis</option>
                                    <option value="kerjasama">Kerjasama</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Pesan</label>
                            <textarea rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full gradient-purple-yellow text-white font-bold py-3 px-6 rounded-lg hover:shadow-lg transition duration-300">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-purple-50 rounded-2xl p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Alamat</h4>
                                    <p class="text-gray-600">Jl. Pendidikan Raya No. 54<br>Sukolilo, Surabaya 60111<br>Jawa Timur, Indonesia</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Telepon</h4>
                                    <p class="text-gray-600">(031) 123-4567<br>(031) 123-4568</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Email</h4>
                                    <p class="text-gray-600">info@smp54sby.sch.id<br>admin@smp54sby.sch.id</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 gradient-purple-yellow rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Jam Operasional</h4>
                                    <p class="text-gray-600">Senin - Jumat: 07.00 - 16.00 WIB<br>Sabtu: 07.00 - 12.00 WIB<br>Minggu: Tutup</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-yellow-50 rounded-2xl p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Media Sosial</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#" class="flex items-center p-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                                <i class="fab fa-facebook text-2xl mr-3"></i>
                                <div>
                                    <div class="font-semibold">Facebook</div>
                                    <div class="text-sm opacity-90">SMP54Surabaya</div>
                                </div>
                            </a>

                            <a href="#" class="flex items-center p-4 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-300">
                                <i class="fab fa-instagram text-2xl mr-3"></i>
                                <div>
                                    <div class="font-semibold">Instagram</div>
                                    <div class="text-sm opacity-90">@smp54sby</div>
                                </div>
                            </a>

                            <a href="#" class="flex items-center p-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                                <i class="fab fa-youtube text-2xl mr-3"></i>
                                <div>
                                    <div class="font-semibold">YouTube</div>
                                    <div class="text-sm opacity-90">SMP 54 Surabaya</div>
                                </div>
                            </a>

                            <a href="#" class="flex items-center p-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fab fa-whatsapp text-2xl mr-3"></i>
                                <div>
                                    <div class="font-semibold">WhatsApp</div>
                                    <div class="text-sm opacity-90">0812-3456-789</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Lokasi Sekolah</h2>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Placeholder untuk Google Maps -->
                <div class="h-96 bg-gray-300 flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-map-marked-alt text-4xl text-gray-500 mb-4"></i>
                        <p class="text-gray-600">Peta Lokasi SMP 54 Surabaya</p>
                        <p class="text-sm text-gray-500 mt-2">Jl. Pendidikan Raya No. 54, Sukolilo, Surabaya</p>
                        <a href="https://maps.google.com" target="_blank" class="mt-4 inline-block bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-300">
                            <i class="fas fa-external-link-alt mr-2"></i> Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-lg text-gray-600">Temukan jawaban untuk pertanyaan umum tentang SMP 54 Surabaya</p>
            </div>

            <div class="space-y-6">
                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition duration-300 flex items-center justify-between">
                        <span>Bagaimana cara mendaftarkan anak untuk menjadi siswa baru?</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">Pendaftaran siswa baru dilakukan setiap tahun pada bulan Juni-Juli. Anda dapat mengunjungi sekolah langsung atau menghubungi kami melalui telepon untuk mendapatkan informasi lengkap tentang syarat dan prosedur pendaftaran.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition duration-300 flex items-center justify-between">
                        <span>Apa saja ekstrakurikuler yang tersedia?</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">Kami menyediakan berbagai ekstrakurikuler seperti olahraga (basket, sepak bola, voli, badminton), seni (musik, tari, drama), dan akademik (English Club, Science Club, dll). Setiap siswa wajib mengikuti minimal satu ekstrakurikuler.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition duration-300 flex items-center justify-between">
                        <span>Bagaimana sistem presensi digital bekerja?</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">Sistem presensi digital memungkinkan siswa untuk melakukan absensi kehadiran secara online. Siswa dapat login ke sistem, memilih ekstrakurikuler yang diikuti, dan melakukan presensi. Data kehadiran akan otomatis tercatat dan dapat dipantau oleh guru pembina.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition duration-300 flex items-center justify-between">
                        <span>Apakah ada biaya tambahan untuk ekstrakurikuler?</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">Sebagian besar ekstrakurikuler tidak dikenakan biaya tambahan. Namun, untuk beberapa kegiatan khusus seperti study tour atau kompetisi luar sekolah, mungkin ada biaya tambahan yang akan dikomunikasikan kepada orang tua terlebih dahulu.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition duration-300 flex items-center justify-between">
                        <span>Bagaimana cara menghubungi guru pembina ekstrakurikuler?</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">Anda dapat menghubungi guru pembina melalui sistem digital kami, atau langsung datang ke sekolah pada jam kerja. Informasi kontak guru pembina juga tersedia di papan pengumuman sekolah dan sistem informasi siswa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Contact -->
<section class="py-16 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Kontak Darurat</h2>
            <p class="text-lg mb-8 opacity-90">Dalam situasi darurat, Anda dapat menghubungi nomor-nomor berikut</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="font-bold mb-2">Kepala Sekolah</h3>
                    <p class="opacity-90">081234567890</p>
                </div>

                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-nurse text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="font-bold mb-2">UKS Sekolah</h3>
                    <p class="opacity-90">081234567891</p>
                </div>

                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="font-bold mb-2">Keamanan</h3>
                    <p class="opacity-90">081234567892</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// FAQ Toggle
document.querySelectorAll('.faq-button').forEach(button => {
    button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
        } else {
            content.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    });
});
</script>
@endsection