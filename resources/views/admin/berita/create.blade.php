<!-- resources/views/admin/berita/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Berita Baru</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                Judul Berita
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('judul') border-red-500 @enderror"
                   id="judul" name="judul" type="text" value="{{ old('judul') }}" required>
            @error('judul')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="konten">
                Konten Berita
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('konten') border-red-500 @enderror"
                      id="konten" name="konten" rows="8" required>{{ old('konten') }}</textarea>
            @error('konten')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">
                Foto Berita (Opsional)
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('foto') border-red-500 @enderror"
                   id="foto" name="foto" type="file" accept="image/*">
            <p class="text-xs text-gray-500 mt-1">Format yang diterima: JPG, PNG, GIF. Maksimal 2MB.</p>
            @error('foto')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
            <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Simpan Berita
            </button>
        </div>
    </form>
</div>
@endsection
