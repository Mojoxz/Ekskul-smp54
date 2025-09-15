<!-- resources/views/admin/ekskul/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Edit Ekstrakurikuler</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.ekskul.update', $ekskul->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                Nama Ekstrakurikuler
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror"
                   id="nama" name="nama" type="text" value="{{ old('nama', $ekskul->nama) }}" required>
            @error('nama')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                Deskripsi
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror"
                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="gambar">
                Gambar Ekstrakurikuler
            </label>
            @if($ekskul->gambar)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $ekskul->gambar) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg">
                    <p class="text-sm text-gray-500 mt-2">Gambar saat ini</p>
                </div>
            @endif
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('gambar') border-red-500 @enderror"
                   id="gambar" name="gambar" type="file" accept="image/*">
            <p class="text-xs text-gray-500 mt-1">Format yang diterima: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
            @error('gambar')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">
                    Kategori
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kategori') border-red-500 @enderror"
                        id="kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="olahraga" {{ old('kategori', $ekskul->kategori) == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                    <option value="seni" {{ old('kategori', $ekskul->kategori) == 'seni' ? 'selected' : '' }}>Seni</option>
                    <option value="akademik" {{ old('kategori', $ekskul->kategori) == 'akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="keagamaan" {{ old('kategori', $ekskul->kategori) == 'keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                    <option value="lainnya" {{ old('kategori', $ekskul->kategori) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('jam_mulai')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jam_selesai">
                    Jam Selesai
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jam_selesai') border-red-500 @enderror"
                       id="jam_selesai" name="jam_selesai" type="time" value="{{ old('jam_selesai', $ekskul->jam_selesai ? date('H:i', strtotime($ekskul->jam_selesai)) : '') }}" required>
                @error('jam_selesai')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="status" value="1" class="mr-2" {{ old('status', $ekskul->status) ? 'checked' : '' }}>
                <span class="text-gray-700 text-sm font-bold">Aktif</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.ekskul.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Update Ekstrakurikuler
            </button>
        </div>
    </form>
</div>
@endsection