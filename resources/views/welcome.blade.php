<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('title', 'SMP 54 Surabaya - Sistem Ekstrakurikuler')

@section('content')
<div class="text-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Sistem Ekstrakurikuler</h1>
        <h2 class="text-2xl text-blue-600 mb-6">SMP 54 Surabaya</h2>

        <p class="text-gray-600 mb-8">Selamat datang di sistem presensi ekstrakurikuler. Silakan pilih jenis login sesuai dengan peran Anda.</p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('admin.login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                Login Admin
            </a>
            <a href="{{ route('murid.login') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                Login Murid
            </a>
        </div>
    </div>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="font-bold text-lg mb-2">Untuk Admin</h3>
            <p class="text-gray-600">Kelola data murid, ekstrakurikuler, dan rekap presensi</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="font-bold text-lg mb-2">Untuk Murid</h3>
            <p class="text-gray-600">Lakukan presensi dan lihat statistik kehadiran</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="font-bold text-lg mb-2">Berita Terkini</h3>
            <p class="text-gray-600">Dapatkan informasi terbaru seputar kegiatan ekstrakurikuler</p>
        </div>
    </div>
</div>
@endsection
