<!-- resources/views/admin/berita/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Kelola Berita</h1>
    <a href="{{ route('admin.berita.create') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
        Tambah Berita
    </a>
</div>

<div class="grid gap-6">
    @foreach($beritas as $berita)
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div class="flex-1">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $berita->judul }}</h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($berita->konten, 150) }}</p>

                <div class="flex items-center text-sm text-gray-500">
                    <span>Oleh: {{ $berita->user->name }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $berita->created_at->format('d/m/Y H:i') }}</span>
                    <span class="mx-2">•</span>
                    @if($berita->status)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Nonaktif
                        </span>
                    @endif
                </div>
            </div>

            @if($berita->foto)
            <div class="ml-4">
                <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto berita" class="w-20 h-20 object-cover rounded">
            </div>
            @endif

            <div class="ml-4 flex flex-col space-y-2">
                <!-- Fixed Edit Button -->
                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                    Edit
                </a>
                
                <!-- Fixed Delete Button with Modal Trigger -->
                <form method="POST" action="{{ route('admin.berita.destroy', $berita->id) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $beritas->links() }}
</div>

@if($beritas->count() == 0)
<div class="bg-white rounded-lg shadow p-8 text-center">
    <p class="text-gray-500">Belum ada berita yang dibuat.</p>
    <a href="{{ route('admin.berita.create') }}" class="inline-block mt-4 bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
        Buat Berita Pertama
    </a>
</div>
@endif

<!-- Success/Error Messages -->
@if(session('success'))
<div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg z-50" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
        <span class="cursor-pointer">&times;</span>
    </span>
</div>
@endif

@if(session('error'))
<div class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg z-50" role="alert">
    <span class="block sm:inline">{{ session('error') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
        <span class="cursor-pointer">&times;</span>
    </span>
</div>
@endif

<script>
// Auto-hide success/error messages after 5 seconds
setTimeout(function() {
    const alerts = document.querySelectorAll('[role="alert"]');
    alerts.forEach(alert => {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
    });
}, 5000);
</script>
@endsection