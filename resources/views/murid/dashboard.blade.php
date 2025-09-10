<!-- resources/views/murid/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Murid')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Murid</h1>
    <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}!</p>
</div>

<div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <svg class="w-8 h-8 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-blue-800">Ekstrakurikuler Aktif</h3>
            <div class="mt-1 text-sm text-blue-700">
                <p>{{ $selectedEkskul->nama }} - {{ $selectedEkskul->hari }} {{ date('H:i', strtotime($selectedEkskul->jam_mulai)) }}-{{ date('H:i', strtotime($selectedEkskul->jam_selesai)) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-500 rounded-full text-white mr-4">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Hadir</p>
                <p class="text-2xl font-bold text-green-600">{{ $totalHadir }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-500 rounded-full text-white mr-4">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Izin</p>
                <p class="text-2xl font-bold text-yellow-600">{{ $totalIzin }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-red-500 rounded-full text-white mr-4">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Tidak Hadir</p>
                <p class="text-2xl font-bold text-red-600">{{ $totalTidakHadir }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold mb-4">Menu Cepat</h3>
        <div class="space-y-3">
            <a href="{{ route('murid.presensi') }}" class="block p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-500 rounded text-white mr-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-blue-800">Presensi</h4>
                        <p class="text-sm text-blue-600">Catat kehadiran hari ini</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('murid.homepage') }}" class="block p-3 bg-green-50 hover:bg-green-100 rounded-lg transition">
                <div class="flex items-center">
                    <div class="p-2 bg-green-500 rounded text-white mr-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-green-800">Berita & Info</h4>
                        <p class="text-sm text-green-600">Lihat informasi terbaru</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold mb-4">Statistik Kehadiran</h3>
        <div class="space-y-4">
            @php
                $total = $totalHadir + $totalIzin + $totalTidakHadir;
                $hadirPercent = $total > 0 ? round(($totalHadir / $total) * 100) : 0;
                $izinPercent = $total > 0 ? round(($totalIzin / $total) * 100) : 0;
                $tidakHadirPercent = $total > 0 ? round(($totalTidakHadir / $total) * 100) : 0;
            @endphp

            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-600">Kehadiran</span>
                    <span class="text-sm font-medium">{{ $hadirPercent }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $hadirPercent }}%"></div>
                </div>
            </div>

            @if($total > 0)
            <div class="text-center text-sm text-gray-600">
                <p>Total Aktivitas: {{ $total }} kali</p>
            </div>
            @else
            <div class="text-center text-sm text-gray-500">
                <p>Belum ada data presensi</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
