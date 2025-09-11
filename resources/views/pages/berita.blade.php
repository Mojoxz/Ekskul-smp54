@extends('layouts.app')

@section('title', 'Berita - SMP 54 Surabaya')

@section('content')
<!-- Hero Section -->
<section class="py-20 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-6">Berita & Informasi</h1>
        <p class="text-xl max-w-3xl mx-auto opacity-90">Ikuti perkembangan terbaru seputar kegiatan sekolah, prestasi siswa, dan informasi penting lainnya</p>
    </div>
</section>

<!-- Featured News -->
@if($beritas->count() > 0)
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Latest News -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Berita Terbaru</h2>
                
                @php $featured = $beritas->first() @endphp
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-12">
                    <div class="order-2 lg:order-1">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            {{ $featured->created_at->format('d F Y') }}
                            <span class="mx-3">•</span>
                            <i class="fas fa-user mr-2"></i>
                            {{ $featured->user->name }}
                        </div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $featured->judul }}</h1>
                        <p class="text-gray-600 mb-6 text-lg leading-relaxed">{{ Str::limit(strip_tags($featured->konten), 200) }}</p>
                        <a href="{{ route('berita.detail', $featured->id) }}" class="gradient-purple-yellow text-white font-bold py-3 px-6 rounded-full hover:shadow-lg transition duration-300 inline-block">
                            <i class="fas fa-arrow-right mr-2"></i> Baca Selengkapnya
                        </a>
                    </div>
                    <div class="order-1 lg:order-2">
                        <div class="rounded-2xl overflow-hidden shadow-xl">
                            @if($featured->foto)
                                <img src="{{ asset('storage/' . $featured->foto) }}" alt="{{ $featured->judul }}" class="w-full h-80 object-cover">
                            @else
                                <div class="h-80 gradient-purple-yellow flex items-center justify-center">
                                    <i class="fas fa-newspaper text-white text-6xl"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beritas->skip(1) as $berita)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
                    <div class="h-48 overflow-hidden">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="h-full gradient-purple-yellow flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-3xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $berita->created_at->format('d M Y') }}
                            <span class="mx-2">•</span>
                            <i class="fas fa-user mr-1"></i>
                            {{ $berita->user->name }}
                        </div>
                        <h3 class="font-bold text-lg mb-3 text-gray-800 line-clamp-2">{{ $berita->judul }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                        <a href="{{ route('berita.detail', $berita->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold transition duration-300 inline-flex items-center">
                            <i class="fas fa-arrow-right mr-2"></i> Baca Selengkapnya
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $beritas->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</section>
@else
<!-- Empty State -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-md mx-auto">
            <div class="w-24 h-24 gradient-purple-yellow rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-newspaper text-white text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Berita</h2>
            <p class="text-gray-600 mb-8">Saat ini belum ada berita yang dipublikasikan. Silakan kembali lagi nanti untuk mendapatkan informasi terbaru.</p>
            <a href="{{ route('home') }}" class="gradient-purple-yellow text-white font-bold py-3 px-6 rounded-full hover:shadow-lg transition duration-300 inline-block">
                <i class="fas fa-home mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endif

<!-- Newsletter Section -->
<section class="py-20 gradient-purple-yellow text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl font-bold mb-4">Jangan Lewatkan Informasi Terbaru</h2>
            <p class="text-lg mb-8 opacity-90">Dapatkan update berita dan informasi sekolah langsung ke email Anda</p>
            
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-4 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-full transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Berlangganan
                </button>
            </form>
            
            <p class="text-sm mt-4 opacity-75">* Dengan berlangganan, Anda akan mendapatkan notifikasi berita terbaru dari SMP 54 Surabaya</p>
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
</style>
@endsection