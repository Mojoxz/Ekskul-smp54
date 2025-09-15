<!-- resources/views/admin/rekap-presensi.blade.php -->
@extends('layouts.admin')

@section('title', 'Rekap Presensi')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Rekap Presensi</h1>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <form method="GET" action="{{ route('admin.rekap.presensi') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_mulai">
                Tanggal Mulai
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   id="tanggal_mulai" name="tanggal_mulai" type="date" value="{{ request('tanggal_mulai') }}">
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_selesai">
                Tanggal Selesai
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   id="tanggal_selesai" name="tanggal_selesai" type="date" value="{{ request('tanggal_selesai') }}">
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="ekskul_id">
                Ekstrakurikuler
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="ekskul_id" name="ekskul_id">
                <option value="">Semua Ekstrakurikuler</option>
                @foreach($ekskuls as $ekskul)
                    <option value="{{ $ekskul->id }}" {{ request('ekskul_id') == $ekskul->id ? 'selected' : '' }}>
                        {{ $ekskul->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                Filter
            </button>
        </div>
    </form>
</div>

@if($presensis->count() > 0)
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Murid</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ekstrakurikuler</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($presensis as $index => $presensi)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $presensi->user->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $presensi->user->kelas }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $presensi->ekskul->nama }}
                </td>
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
                <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate">
                    {{ $presensi->keterangan ?? '-' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4 bg-white p-4 rounded-lg shadow">
    <h3 class="font-bold mb-2">Ringkasan:</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="text-center">
            <p class="text-2xl font-bold text-green-600">{{ $presensis->where('status', 'hadir')->count() }}</p>
            <p class="text-sm text-gray-600">Hadir</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-yellow-600">{{ $presensis->where('status', 'izin')->count() }}</p>
            <p class="text-sm text-gray-600">Izin</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-red-600">{{ $presensis->where('status', 'tidak_hadir')->count() }}</p>
            <p class="text-sm text-gray-600">Tidak Hadir</p>
        </div>
    </div>
</div>
@else
<div class="bg-white rounded-lg shadow p-8 text-center">
    <p class="text-gray-500">Tidak ada data presensi untuk filter yang dipilih.</p>
    <p class="text-sm text-gray-400 mt-2">Silakan pilih rentang tanggal untuk melihat data presensi.</p>
</div>
@endif
@endsection
