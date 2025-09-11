@extends('layouts.app')

@section('title', $berita->judul . ' - SMP 54 Surabaya')

@section('content')
<!-- Breadcrumb -->
<section class="bg-gray-100 py-4">
    <div class="container mx-auto px-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600 inline-flex items-center">
                        <i class="fas fa-home mr-2"></i> Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('berita') }}" class="text-gray-700 hover:text-purple-600">Berita</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-500 truncate">{{ Str::limit($berita->judul, 50) }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Article Content -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <article>
                <!-- Article Header -->
                <header class="mb-8">
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-calendar mr-2"></i>
                        {{ $berita->created_at->format('d F Y, H:i') }} WIB
                        <span class="mx-3">•</span>
                        <i class="fas fa-user mr-2"></i>
                        {{ $berita->user->name }}
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight mb-6">{{ $berita->judul }}</h1>
                </header>

                <!-- Featured Image -->
                @if($berita->foto)
                <div class="mb-8">
                    <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-80 md:h-96 object-cover rounded-2xl shadow-lg">
                </div>
                @endif

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-700 leading-relaxed text-justify">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Bagikan Artikel:</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}" target="_blank" class="bg-blue-400 hover:bg-blue-500 text-white p-3 rounded-full transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . request()->fullUrl()) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full transition duration-300">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <button onclick="copyToClipboard()" class="bg-gray-500 hover:bg-gray-600 text-white p-3 rounded-full transition duration-300">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Related News -->
@if($beritaLainnya->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Berita Lainnya</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($beritaLainnya as $item)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
                    <div class="h-48 overflow-hidden">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="h-full gradient-purple-yellow flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-3xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                        <h3 class="font-bold text-lg mb-3 text-gray-800 line-clamp-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                        <a href="{{ route('berita.detail', $item->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold transition duration-300 inline-flex items-center">
                            <i class="fas fa-arrow-right mr-2"></i> Baca Selengkapnya
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- Back to News -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 text-center">
        <a href="{{ route('berita') }}" class="gradient-purple-yellow text-white font-bold py-3 px-6 rounded-full hover:shadow-lg transition duration-300 inline-block">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Halaman Berita
        </a>
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

<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        // Show toast notification
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
        toast.textContent = 'Link berhasil disalin!';
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.remove();
        }, 3000);
    });
}
</script>
@endsection