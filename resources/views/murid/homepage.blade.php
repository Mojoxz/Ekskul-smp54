<!-- resources/views/murid/homepage.blade.php -->
@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Beranda</h1>
    <p class="text-gray-600">Informasi dan berita terkini seputar kegiatan ekstrakurikuler</p>
</div>

<div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg p-6 mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2">Selamat Datang!</h2>
            <p class="text-blue-100">{{ auth()->user()->name }} - {{ auth()->user()->kelas }}</p>
            <p class="text-blue-100">Jangan lupa untuk melakukan presensi hari ini!</p>
        </div>
        <div class="hidden md:block">
            <svg class="w-24 h-24 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
    </div>
</div>

<div class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Berita & Informasi</h2>
        @if($beritas->count() > 0)
            <span class="text-sm text-gray-500">{{ $beritas->count() }} berita terbaru</span>
        @endif
    </div>

    @if($beritas->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($beritas as $berita)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
            @if($berita->foto)
            <div class="h-48 bg-gray-200">
                <img src="{{ asset('storage/' . $berita->foto) }}"
                     alt="{{ $berita->judul }}"
                     class="w-full h-full object-cover">
            </div>
            @else
            <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                </svg>
            </div>
            @endif

            <div class="p-4">
                <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">{{ $berita->judul }}</h3>
                <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ Str::limit($berita->konten, 120) }}</p>

                <div class="flex items-center justify-between text-xs text-gray-500">
                    <span>{{ $berita->created_at->format('d M Y') }}</span>
                    <span>Oleh: {{ $berita->user->name }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Berita</h3>
        <p class="text-gray-500">Berita dan informasi akan ditampilkan di sini.</p>
    </div>
    @endif
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Penting</h3>
        <div class="space-y-3">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-gray-700">Jangan lupa melakukan presensi setiap mengikuti kegiatan ekstrakurikuler.</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-gray-700">Pantau statistik kehadiran Anda di dashboard.</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-gray-700">Hubungi pembimbing jika ada kendala teknis.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Menu Cepat</h3>
        <div class="space-y-3">
            <a href="{{ route('murid.dashboard') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white mr-3">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-700">Dashboard</span>
            </a>

            <a href="{{ route('murid.presensi') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white mr-3">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-700">Presensi</span>
            </a>
        </div>
    </div>
</div>
@endsection
