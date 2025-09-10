<!-- resources/views/admin/murid/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Murid')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Murid Baru</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.murid.store') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nama Lengkap
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                       id="name" name="name" type="text" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                       id="email" name="email" type="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kelas">
                    Kelas
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kelas') border-red-500 @enderror"
                       id="kelas" name="kelas" type="text" value="{{ old('kelas') }}" placeholder="Contoh: 8A" required>
                @error('kelas')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                       id="password" name="password" type="password" required>
                @error('password')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Ekstrakurikuler yang Diikuti
            </label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($ekskuls as $ekskul)
                <div class="flex items-center">
                    <input type="checkbox" name="ekskul_ids[]" value="{{ $ekskul->id }}"
                           id="ekskul_{{ $ekskul->id }}"
                           class="mr-2"
                           {{ in_array($ekskul->id, old('ekskul_ids', [])) ? 'checked' : '' }}>
                    <label for="ekskul_{{ $ekskul->id }}" class="text-sm text-gray-700">
                        {{ $ekskul->nama }}
                    </label>
                </div>
                @endforeach
            </div>
            @error('ekskul_ids')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('admin.murid.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Simpan Murid
            </button>
        </div>
    </form>
</div>
@endsection
