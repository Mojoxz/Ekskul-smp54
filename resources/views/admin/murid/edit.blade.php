@extends('layouts.app')

@section('title', 'Edit Murid - SMP 54 Surabaya')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="text-purple-600 hover:text-purple-800 transition duration-300">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <span class="text-gray-500">/</span>
                </li>
                <li>
                    <a href="{{ route('admin.murid.index') }}" class="text-purple-600 hover:text-purple-800 transition duration-300">
                        Data Murid
                    </a>
                </li>
                <li>
                    <span class="text-gray-500">/</span>
                </li>
                <li class="text-gray-700 font-medium">Edit Murid</li>
            </ol>
        </nav>
    </div>

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Murid</h1>
                <p class="text-gray-600">Perbarui data murid dan ekstrakurikuler yang diikuti</p>
            </div>
            <a href="{{ route('admin.murid.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="gradient-purple-yellow text-white p-6">
            <h2 class="text-xl font-semibold flex items-center">
                <i class="fas fa-user-edit mr-3"></i>
                Form Edit Murid
            </h2>
        </div>

        <form action="{{ route('admin.murid.update', $murid->id) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <!-- Error Messages -->
            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <h4 class="font-semibold">Terdapat kesalahan input:</h4>
                    </div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $murid->name) }}" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300 @error('name') border-red-500 @enderror" 
                                   placeholder="Masukkan nama lengkap"
                                   required>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $murid->email) }}" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300 @error('email') border-red-500 @enderror" 
                                   placeholder="Masukkan email"
                                   required>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kelas -->
                    <div>
                        <label for="kelas" class="block text-sm font-semibold text-gray-700 mb-2">
                            Kelas <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-chalkboard absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" 
                                   id="kelas" 
                                   name="kelas" 
                                   value="{{ old('kelas', $murid->kelas) }}" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300 @error('kelas') border-red-500 @enderror" 
                                   placeholder="Contoh: VII-A, VIII-B"
                                   required>
                        </div>
                        @error('kelas')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password Baru
                        </label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300 @error('password') border-red-500 @enderror" 
                                   placeholder="Masukkan password baru">
                            <button type="button" 
                                    onclick="togglePassword()"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i id="toggleIcon" class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password. Minimum 6 karakter.</p>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <!-- Current Ekstrakurikuler Info -->
                    <div class="bg-purple-50 rounded-lg p-4 mb-6">
                        <h3 class="font-semibold text-purple-800 mb-3 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Ekstrakurikuler Saat Ini
                        </h3>
                        @if($murid->ekskuls->count() > 0)
                            <div class="space-y-2">
                                @foreach($murid->ekskuls as $ekskul)
                                    <div class="flex items-center justify-between bg-white rounded-lg p-3">
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $ekskul->nama }}</p>
                                            <p class="text-sm text-gray-600">{{ $ekskul->hari }} | {{ $ekskul->jam_mulai }}-{{ $ekskul->jam_selesai }}</p>
                                        </div>
                                        <i class="fas fa-check text-green-500"></i>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-purple-600 text-sm italic">Belum mengikuti ekstrakurikuler apapun</p>
                        @endif
                    </div>

                    <!-- Pilih Ekstrakurikuler -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-4">
                            Pilih Ekstrakurikuler <span class="text-red-500">*</span>
                        </label>
                        @if($ekskuls->count() > 0)
                            <div class="space-y-3 max-h-64 overflow-y-auto border border-gray-200 rounded-lg p-4">
                                @foreach($ekskuls as $ekskul)
                                    <label class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition duration-300 cursor-pointer border {{ in_array($ekskul->id, old('ekskul_ids', $murid->ekskuls->pluck('id')->toArray())) ? 'border-purple-500 bg-purple-50' : 'border-gray-200' }}">
                                        <input type="checkbox" 
                                               name="ekskul_ids[]" 
                                               value="{{ $ekskul->id }}"
                                               class="mt-1 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                                               {{ in_array($ekskul->id, old('ekskul_ids', $murid->ekskuls->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-medium text-gray-900">{{ $ekskul->nama }}</p>
                                            <div class="text-sm text-gray-600 flex items-center space-x-4 mt-1">
                                                <span class="flex items-center">
                                                    <i class="fas fa-calendar mr-1"></i> {{ $ekskul->hari }}
                                                </span>
                                                <span class="flex items-center">
                                                    <i class="fas fa-clock mr-1"></i> {{ $ekskul->jam_mulai }}-{{ $ekskul->jam_selesai }}
                                                </span>
                                                <span class="flex items-center">
                                                    <i class="fas fa-users mr-1"></i> Max {{ $ekskul->kapasitas }}
                                                </span>
                                            </div>
                                            @if($ekskul->deskripsi)
                                                <p class="text-sm text-gray-500 mt-1">{{ Str::limit($ekskul->deskripsi, 80) }}</p>
                                            @endif
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-3xl mb-4"></i>
                                <p class="text-gray-600 mb-4">Tidak ada ekstrakurikuler yang tersedia.</p>
                                <a href="{{ route('admin.ekskul.create') }}" 
                                   class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-300">
                                    <i class="fas fa-plus mr-2"></i>Tambah Ekstrakurikuler
                                </a>
                            </div>
                        @endif
                        @error('ekskul_ids')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.murid.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition duration-300 flex items-center">
                    <i class="fas fa-times mr-2"></i> Batal
                </a>
                <button type="submit" 
                        class="gradient-purple-yellow text-white px-6 py-3 rounded-lg hover:opacity-90 transition duration-300 flex items-center font-semibold">
                    <i class="fas fa-save mr-2"></i> Update Murid
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.className = 'fas fa-eye-slash';
    } else {
        passwordInput.type = 'password';
        toggleIcon.className = 'fas fa-eye';
    }
}

// Auto-capitalize nama
document.getElementById('name').addEventListener('input', function() {
    let value = this.value;
    let words = value.split(' ');
    for (let i = 0; i < words.length; i++) {
        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
    }
    this.value = words.join(' ');
});

// Format kelas to uppercase
document.getElementById('kelas').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const checkedBoxes = document.querySelectorAll('input[name="ekskul_ids[]"]:checked');
    if (checkedBoxes.length === 0) {
        e.preventDefault();
        alert('Pilih minimal satu ekstrakurikuler!');
        return false;
    }
});

// Checkbox interaction visual feedback
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const label = this.closest('label');
        if (this.checked) {
            label.classList.add('border-purple-500', 'bg-purple-50');
            label.classList.remove('border-gray-200');
        } else {
            label.classList.remove('border-purple-500', 'bg-purple-50');
            label.classList.add('border-gray-200');
        }
    });
});
</script>
@endsection