<!-- resources/views/admin/ekskul/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Ekstrakurikuler Baru</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.ekskul.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                Nama Ekstrakurikuler
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror"
                   id="nama" name="nama" type="text" value="{{ old('nama') }}" required>
            @error('nama')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                Deskripsi
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror"
                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="gambar">
                Gambar Ekstrakurikuler (Opsional)
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('gambar') border-red-500 @enderror"
                   id="gambar" name="gambar" type="file" accept="image/*">
            <p class="text-xs text-gray-500 mt-1">Format yang diterima: JPG, PNG, GIF. Maksimal 2MB.</p>
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
                    <option value="olahraga" {{ old('kategori') == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                    <option value="seni" {{ old('kategori') == 'seni' ? 'selected' : '' }}>Seni</option>
                    <option value="akademik" {{ old('kategori') == 'akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="keagamaan" {{ old('kategori') == 'keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                    <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('kategori')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kapasitas">
                    Kapasitas Maksimal
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kapasitas') border-red-500 @enderror"
                       id="kapasitas" name="kapasitas" type="number" min="1" value="{{ old('kapasitas', 30) }}" required>
                @error('kapasitas')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="hari">
                    Hari
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('hari') border-red-500 @enderror"
                        id="hari" name="hari" required>
                    <option value="">Pilih Hari</option>
                    <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                </select>
                @error('hari')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jam_mulai">
                    Jam Mulai
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jam_mulai') border-red-500 @enderror"
                       id="jam_mulai" name="jam_mulai" type="time" value="{{ old('jam_mulai') }}" required>
                @error('jam_mulai')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jam_selesai">
                    Jam Selesai
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jam_selesai') border-red-500 @enderror"
                       id="jam_selesai" name="jam_selesai" type="time" value="{{ old('jam_selesai') }}" required>
                @error('jam_selesai')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="status" value="1" class="mr-2" {{ old('status', true) ? 'checked' : '' }}>
                <span class="text-gray-700 text-sm font-bold">Aktif</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.ekskul.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Simpan Ekstrakurikuler
            </button>
        </div>
    </form>
</div>

<script>
// Image preview
document.getElementById('gambar').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Remove existing preview
            const existingPreview = document.getElementById('image-preview');
            if (existingPreview) {
                existingPreview.remove();
            }

            // Create preview
            const preview = document.createElement('div');
            preview.id = 'image-preview';
            preview.className = 'mt-4';
            preview.innerHTML = `
                <p class="text-sm text-gray-600 mb-2">Preview:</p>
                <img src="${e.target.result}" alt="Preview" class="w-32 h-32 object-cover rounded-lg border">
            `;
            
            document.getElementById('gambar').parentNode.appendChild(preview);
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection