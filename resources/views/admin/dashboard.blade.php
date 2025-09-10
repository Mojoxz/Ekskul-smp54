<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-blue-500 rounded-full text-white mr-4">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Murid</p>
                <p class="text-2xl font-bold">{{ $totalMurid }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-500 rounded-full text-white mr-4">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Ekstrakurikuler</p>
                <p class="text-2xl font-bold">{{ $totalEkskul }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-500 rounded-full text-white mr-4">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 002 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Presensi Hari Ini</p>
                <p class="text-2xl font-bold">{{ $totalPresensiHariIni }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-purple-500 rounded-full text-white mr-4">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Berita</p>
                <p class="text-2xl font-bold">{{ $totalBerita }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Menu Admin</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.murid.index') }}" class="p-4 bg-blue-100 rounded-lg hover:bg-blue-200 transition">
            <h3 class="font-bold text-blue-800">Kelola Murid</h3>
            <p class="text-sm text-blue-600">Tambah, edit, dan kelola data murid</p>
        </a>
        <a href="{{ route('admin.ekskul.index') }}" class="p-4 bg-green-100 rounded-lg hover:bg-green-200 transition">
            <h3 class="font-bold text-green-800">Kelola Ekstrakurikuler</h3>
            <p class="text-sm text-green-600">Tambah dan kelola ekstrakurikuler</p>
        </a>
        <a href="{{ route('admin.rekap.presensi') }}" class="p-4 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition">
            <h3 class="font-bold text-yellow-800">Rekap Presensi</h3>
            <p class="text-sm text-yellow-600">Lihat rekap kehadiran murid</p>
        </a>
        <a href="{{ route('admin.berita.index') }}" class="p-4 bg-purple-100 rounded-lg hover:bg-purple-200 transition">
            <h3 class="font-bold text-purple-800">Kelola Berita</h3>
            <p class="text-sm text-purple-600">Tambah dan kelola berita</p>
        </a>
    </div>
</div>
@endsection
