<!-- resources/views/murid/presensi.blade.php -->
@extends('layouts.murid')

@section('title', 'Presensi')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Presensi</h1>
    <p class="text-gray-600">{{ $selectedEkskul->nama }} - {{ now()->format('d F Y') }}</p>
</div>

@if($todayPresensi)
<div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <svg class="w-8 h-8 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-green-800">Presensi Hari Ini Sudah Tercatat</h3>
            <div class="mt-1 text-sm text-green-700">
                <p>Status: <strong>{{ ucfirst($todayPresensi->status) }}</strong> pada {{ date('H:i', strtotime($todayPresensi->jam)) }}</p>
                @if($todayPresensi->keterangan)
                    <p>Keterangan: {{ $todayPresensi->keterangan }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@else
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-bold mb-4">Form Presensi</h2>

    <form method="POST" action="{{ route('murid.presensi.store') }}">
        @csrf

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Status Kehadiran
            </label>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="radio" name="status" value="hadir" class="mr-2" {{ old('status') == 'hadir' ? 'checked' : '' }} required>
                    <span class="text-green-700">Hadir</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="status" value="izin" class="mr-2" {{ old('status') == 'izin' ? 'checked' : '' }} required>
                    <span class="text-yellow-700">Izin</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="status" value="tidak_hadir" class="mr-2" {{ old('status') == 'tidak_hadir' ? 'checked' : '' }} required>
                    <span class="text-red-700">Tidak Hadir</span>
                </label>
            </div>
            @error('status')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">
                Keterangan (Opsional)
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan jika diperlukan...">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h4 class="font-medium text-gray-700 mb-2">Informasi Presensi</h4>
            <div class="text-sm text-gray-600 space-y-1">
                <p>Waktu: {{ now()->format('H:i:s') }}</p>
                <p>Tanggal: {{ now()->format('d F Y') }}</p>
                <p>Ekstrakurikuler: {{ $selectedEkskul->nama }}</p>
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
            Simpan Presensi
        </button>
    </form>
</div>
@endif

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium">Riwayat Presensi Terakhir</h3>
    </div>

    @if($recentPresensis->count() > 0)
    <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($recentPresensis as $presensi)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $presensi->tanggal->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ date('H:i', strtotime($presensi->jam)) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($presensi->status == 'hadir')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Hadir
                            </span>
                        @elseif($presensi->status == 'izin')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Izin
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Tidak Hadir
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        {{ $presensi->keterangan ?? '-' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="p-8 text-center">
        <p class="text-gray-500">Belum ada riwayat presensi.</p>
    </div>
    @endif
</div>
@endsection
