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
                @if($todayPresensi->foto_presensi)
                    <div class="mt-2">
                        <p class="mb-1">Foto Presensi:</p>
                        <img src="{{ $todayPresensi->foto_presensi_url }}" alt="Foto Presensi" class="w-32 h-32 object-cover rounded-lg border">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@else
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-bold mb-4">Form Presensi</h2>

    <form method="POST" action="{{ route('murid.presensi.store') }}" id="presensiForm">
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

        <!-- Camera Section -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Foto Presensi (Opsional)
            </label>
            
            <div id="camera-section" class="space-y-4">
                <div class="flex space-x-2">
                    <button type="button" id="openCamera" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Buka Kamera
                    </button>
                    <button type="button" id="closeCamera" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded hidden">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Tutup Kamera
                    </button>
                </div>

                <!-- Camera Preview -->
                <div id="camera-preview" class="hidden">
                    <video id="video" width="100%" height="300" autoplay muted class="rounded-lg border"></video>
                    <div class="mt-2 text-center">
                        <button type="button" id="capture" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Ambil Foto
                        </button>
                    </div>
                </div>

                <!-- Captured Photo Preview -->
                <div id="photo-preview" class="hidden">
                    <p class="text-sm text-gray-600 mb-2">Foto yang akan disimpan:</p>
                    <img id="capturedPhoto" src="" alt="Captured photo" class="w-full max-w-md mx-auto rounded-lg border">
                    <div class="mt-2 text-center space-x-2">
                        <button type="button" id="retakePhoto" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Ambil Ulang
                        </button>
                        <button type="button" id="deletePhoto" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Foto
                        </button>
                    </div>
                </div>

                <canvas id="canvas" style="display: none;"></canvas>
            </div>

            <input type="hidden" name="foto_presensi" id="fotoPresensi">
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
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
                    <td class="px-6 py-4 text-sm text-gray-900">
                        @if($presensi->foto_presensi)
                            <img src="{{ $presensi->foto_presensi_url }}" alt="Foto Presensi" class="w-16 h-16 object-cover rounded cursor-pointer" onclick="showFullImage('{{ $presensi->foto_presensi_url }}')">
                        @else
                            <span class="text-gray-400">Tidak ada foto</span>
                        @endif
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

<!-- Modal for full image view -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="relative max-w-4xl max-h-screen p-4">
        <button onclick="closeImageModal()" class="absolute top-2 right-2 text-white hover:text-gray-300 z-10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src="" alt="Full Image" class="max-w-full max-h-full object-contain">
    </div>
</div>

<script>
let stream = null;
let capturedImageData = null;

document.addEventListener('DOMContentLoaded', function() {
    const openCameraBtn = document.getElementById('openCamera');
    const closeCameraBtn = document.getElementById('closeCamera');
    const cameraPreview = document.getElementById('camera-preview');
    const photoPreview = document.getElementById('photo-preview');
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureBtn = document.getElementById('capture');
    const retakeBtn = document.getElementById('retakePhoto');
    const deleteBtn = document.getElementById('deletePhoto');
    const capturedPhoto = document.getElementById('capturedPhoto');
    const fotoPresensiInput = document.getElementById('fotoPresensi');

    // Open camera
    openCameraBtn.addEventListener('click', async function() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ 
                video: { 
                    width: { ideal: 640 },
                    height: { ideal: 480 },
                    facingMode: 'user' // Use front camera if available
                } 
            });
            video.srcObject = stream;
            
            openCameraBtn.classList.add('hidden');
            closeCameraBtn.classList.remove('hidden');
            cameraPreview.classList.remove('hidden');
            photoPreview.classList.add('hidden');
            
        } catch (err) {
            console.error('Error accessing camera:', err);
            alert('Tidak dapat mengakses kamera. Pastikan browser mendukung kamera dan izin telah diberikan.');
        }
    });

    // Close camera
    closeCameraBtn.addEventListener('click', function() {
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            stream = null;
        }
        
        openCameraBtn.classList.remove('hidden');
        closeCameraBtn.classList.add('hidden');
        cameraPreview.classList.add('hidden');
    });

    // Capture photo
    captureBtn.addEventListener('click', function() {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        
        // Draw video frame to canvas
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        
        // Get image data
        capturedImageData = canvas.toDataURL('image/jpeg', 0.8);
        
        // Show preview
        capturedPhoto.src = capturedImageData;
        fotoPresensiInput.value = capturedImageData;
        
        // Hide camera, show preview
        cameraPreview.classList.add('hidden');
        photoPreview.classList.remove('hidden');
        
        // Stop camera
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            stream = null;
        }
        
        closeCameraBtn.classList.add('hidden');
        openCameraBtn.classList.remove('hidden');
    });

    // Retake photo
    retakeBtn.addEventListener('click', function() {
        photoPreview.classList.add('hidden');
        capturedImageData = null;
        fotoPresensiInput.value = '';
        
        // Reopen camera
        openCameraBtn.click();
    });

    // Delete photo
    deleteBtn.addEventListener('click', function() {
        photoPreview.classList.add('hidden');
        capturedImageData = null;
        fotoPresensiInput.value = '';
        capturedPhoto.src = '';
    });
});

// Function to show full image
function showFullImage(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    modalImage.src = imageSrc;
    modal.classList.remove('hidden');
}

// Function to close image modal
function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});
</script>
@endsection