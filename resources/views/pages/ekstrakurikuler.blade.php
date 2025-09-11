@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMP 54 Surabaya')

@section('content')
<!-- Hero Section -->
<section class="py-20 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-6">Ekstrakurikuler</h1>
        <p class="text-xl max-w-3xl mx-auto opacity-90">Temukan dan kembangkan bakat serta minat Anda melalui berbagai kegiatan ekstrakurikuler yang tersedia</p>
    </div>
</section>

<!-- Categories Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                <button onclick="filterEkskul('all')" class="filter-btn bg-purple-500 text-white py-2 px-4 rounded-full font-semibold hover:bg-purple-600 transition duration-300">
                    Semua
                </button>
                <button onclick="filterEkskul('olahraga')" class="filter-btn bg-gray-200 text-gray-700 py-2 px-4 rounded-full font-semibold hover:bg-gray-300 transition duration-300">
                    Olahraga
                </button>
                <button onclick="filterEkskul('seni')" class="filter-btn bg-gray-200 text-gray-700 py-2 px-4 rounded-full font-semibold hover:bg-gray-300 transition duration-300">
                    Seni & Budaya
                </button>
                <button onclick="filterEkskul('akademik')" class="filter-btn bg-gray-200 text-gray-700 py-2 px-4 rounded-full font-semibold hover:bg-gray-300 transition duration-300">
                    Akademik
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Ekstrakurikuler Grid -->
<section class="pb-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            @if($ekskuls->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="ekstrakurikuler-grid">
                @foreach($ekskuls as $ekskul)
                <div class="ekskul-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300" data-category="{{ strtolower($ekskul->nama) }}">
                    <div class="h-48 gradient-purple-yellow flex items-center justify-center relative">
                        <!-- Icon berdasarkan nama ekstrakurikuler -->
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
                        
                        <i class="{{ $icon }} text-white text-4xl"></i>
                        
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">Aktif</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3 text-gray-800">{{ $ekskul->nama }}</h3>
                        <p class="text-gray-600 mb-4">{{ $ekskul->deskripsi ?: 'Kegiatan ekstrakurikuler yang mengembangkan bakat dan minat siswa.' }}</p>
                        
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-clock mr-2 w-4"></i>
                                <span>{{ $ekskul->jam_mulai ? $ekskul->jam_mulai->format('H:i') : '00:00' }} - {{ $ekskul->jam_selesai ? $ekskul->jam_selesai->format('H:i') : '00:00' }} WIB</span>
                            </div>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-calendar mr-2 w-4"></i>
                                <span>{{ $ekskul->hari ?: 'Setiap Hari' }}</span>
                            </div>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-users mr-2 w-4"></i>
                                <span>{{ rand(15, 30) }} Anggota</span>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="flex -space-x-2">
                                        @for($i = 0; $i < 3; $i++)
                                        <div class="w-8 h-8 bg-purple-{{ 500 - ($i * 100) }} rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            {{ chr(65 + $i) }}
                                        </div>
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 ml-2">+{{ rand(10, 25) }} lainnya</span>
                                </div>
                                <button class="text-purple-600 hover:text-purple-800 font-semibold text-sm transition duration-300">
                                    <i class="fas fa-info-circle mr-1"></i> Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-24 h-24 gradient-purple-yellow rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Ekstrakurikuler</h2>
                <p class="text-gray-600 mb-8">Saat ini belum ada kegiatan ekstrakurikuler yang tersedia. Silakan hubungi admin untuk informasi lebih lanjut.</p>
                <a href="{{ route('kontak') }}" class="gradient-purple-yellow text-white font-bold py-3 px-6 rounded-full hover:shadow-lg transition duration-300 inline-block">
                    <i class="fas fa-phone mr-2"></i> Hubungi Kami
                </a>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6">Manfaat Mengikuti Ekstrakurikuler</h2>
            <p class="text-xl mb-12 opacity-90">Berbagai keuntungan yang didapat dari aktif berpartisipasi dalam kegiatan ekstrakurikuler</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6 hover:bg-opacity-30 transition duration-300">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-brain text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">Mengembangkan Skill</h3>
                    <p class="opacity-90 text-sm">Mengasah kemampuan dan bakat sesuai minat masing-masing</p>
                </div>

                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6 hover:bg-opacity-30 transition duration-300">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">Membangun Relasi</h3>
                    <p class="opacity-90 text-sm">Memperluas jaringan pertemanan dan kerjasama tim</p>
                </div>

                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6 hover:bg-opacity-30 transition duration-300">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">Meraih Prestasi</h3>
                    <p class="opacity-90 text-sm">Kesempatan untuk berprestasi di tingkat sekolah hingga nasional</p>
                </div>

                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-6 hover:bg-opacity-30 transition duration-300">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">Membangun Karakter</h3>
                    <p class="opacity-90 text-sm">Membentuk kepribadian yang positif dan tanggung jawab</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Tertarik Bergabung?</h2>
            <p class="text-lg text-gray-600 mb-8">Hubungi kami untuk informasi lebih lanjut tentang pendaftaran ekstrakurikuler</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('kontak') }}" class="gradient-purple-yellow text-white font-bold py-3 px-6 rounded-full hover:shadow-lg transition duration-300 inline-block">
                    <i class="fas fa-phone mr-2"></i> Hubungi Kami
                </a>
                <a href="{{ route('murid.login') }}" class="bg-gray-200 text-gray-700 font-bold py-3 px-6 rounded-full hover:bg-gray-300 transition duration-300 inline-block">
                    <i class="fas fa-user-graduate mr-2"></i> Login Siswa
                </a>
            </div>
        </div>
    </div>
</section>

<script>
function filterEkskul(category) {
    const cards = document.querySelectorAll('.ekskul-card');
    const buttons = document.querySelectorAll('.filter-btn');
    
    // Reset button styles
    buttons.forEach(btn => {
        btn.className = 'filter-btn bg-gray-200 text-gray-700 py-2 px-4 rounded-full font-semibold hover:bg-gray-300 transition duration-300';
    });
    
    // Highlight active button
    event.target.className = 'filter-btn bg-purple-500 text-white py-2 px-4 rounded-full font-semibold hover:bg-purple-600 transition duration-300';
    
    // Filter cards
    cards.forEach(card => {
        if (category === 'all') {
            card.style.display = 'block';
        } else {
            const cardCategory = card.getAttribute('data-category');
            if (cardCategory.includes(category) || 
                (category === 'olahraga' && (cardCategory.includes('basket') || cardCategory.includes('sepak') || cardCategory.includes('futsal') || cardCategory.includes('voli') || cardCategory.includes('badminton') || cardCategory.includes('tenis'))) ||
                (category === 'seni' && (cardCategory.includes('musik') || cardCategory.includes('band') || cardCategory.includes('tari') || cardCategory.includes('dance') || cardCategory.includes('drama') || cardCategory.includes('teater') || cardCategory.includes('lukis') || cardCategory.includes('seni'))) ||
                (category === 'akademik' && (cardCategory.includes('english') || cardCategory.includes('bahasa') || cardCategory.includes('komputer') || cardCategory.includes('programming') || cardCategory.includes('science') || cardCategory.includes('sains') || cardCategory.includes('math') || cardCategory.includes('matematika') || cardCategory.includes('debat')))) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        }
    });
}
</script>
@endsection