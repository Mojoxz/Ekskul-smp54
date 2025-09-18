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

        <div class="flex items-end space-x-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex-1">
                Filter
            </button>
            @if($presensis->count() > 0)
                <a href="{{ route('admin.rekap.export', request()->query()) }}" 
                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </a>
            @endif
        </div>
    </form>
</div>

@if($presensis->count() > 0)
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
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
                    <td class="px-6 py-4 text-sm text-gray-900">
                        @if($presensi->foto_presensi)
                            <div class="flex items-center space-x-2">
                                <img src="{{ $presensi->foto_presensi_url }}" 
                                     alt="Foto Presensi" 
                                     class="w-12 h-12 object-cover rounded cursor-pointer hover:opacity-75 transition-opacity"
                                     onclick="showImageModal('{{ $presensi->foto_presensi_url }}', '{{ $presensi->user->name }}', '{{ $presensi->tanggal->format('d/m/Y') }}')">
                                <button onclick="showImageModal('{{ $presensi->foto_presensi_url }}', '{{ $presensi->user->name }}', '{{ $presensi->tanggal->format('d/m/Y') }}')" 
                                        class="text-blue-600 hover:text-blue-900 text-xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        @else
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Tidak ada
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 max-w-xs">
                        @if($presensi->keterangan)
                            <div class="truncate" title="{{ $presensi->keterangan }}">
                                {{ $presensi->keterangan }}
                            </div>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <div class="flex space-x-2">
                            @if($presensi->foto_presensi)
                                <button onclick="showImageModal('{{ $presensi->foto_presensi_url }}', '{{ $presensi->user->name }}', '{{ $presensi->tanggal->format('d/m/Y') }}')" 
                                        class="text-blue-600 hover:text-blue-900" title="Lihat Foto">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                                <a href="{{ $presensi->foto_presensi_url }}" 
                                   download="presensi_{{ $presensi->user->name }}_{{ $presensi->tanggal->format('Y-m-d') }}.jpg"
                                   class="text-green-600 hover:text-green-900" title="Download Foto">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 bg-white p-4 rounded-lg shadow">
    <h3 class="font-bold mb-2">Ringkasan:</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
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
        <div class="text-center">
            <p class="text-2xl font-bold text-blue-600">{{ $presensis->whereNotNull('foto_presensi')->count() }}</p>
            <p class="text-sm text-gray-600">Dengan Foto</p>
        </div>
    </div>
</div>

<!-- Modal untuk menampilkan foto penuh -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="relative max-w-4xl max-h-screen p-4 w-full">
        <div class="bg-white rounded-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Foto Presensi</h3>
                        <p class="text-sm text-gray-500" id="modalSubtitle"></p>
                    </div>
                    <button onclick="closeImageModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <img id="modalImage" src="" alt="Foto Presensi" class="max-w-full max-h-96 object-contain mx-auto rounded">
            </div>
            <div class="bg-gray-50 px-6 py-4 border-t flex justify-end space-x-3">
                <a id="downloadLink" href="" download="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download
                </a>
                <button onclick="closeImageModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

@else
<div class="bg-white rounded-lg shadow p-8 text-center">
    <div class="text-gray-400 mb-4">
        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
    </div>
    <p class="text-gray-500 text-lg">Tidak ada data presensi untuk filter yang dipilih.</p>
    <p class="text-sm text-gray-400 mt-2">Silakan pilih rentang tanggal untuk melihat data presensi.</p>
</div>
@endif

<script>
function showImageModal(imageSrc, userName, tanggal) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalSubtitle = document.getElementById('modalSubtitle');
    const downloadLink = document.getElementById('downloadLink');
    
    modalImage.src = imageSrc;
    modalTitle.textContent = 'Foto Presensi';
    modalSubtitle.textContent = `${userName} - ${tanggal}`;
    downloadLink.href = imageSrc;
    downloadLink.download = `presensi_${userName.replace(/\s+/g, '_')}_${tanggal.replace(/\//g, '-')}.jpg`;
    
    modal.classList.remove('hidden');
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>
@endsection