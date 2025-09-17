@extends('layouts.murid')

@section('title', 'Profil Saya - Dashboard Siswa')
@section('page-title', 'Profil Saya')
@section('page-subtitle', 'Kelola informasi profil dan keamanan akun Anda')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Profile Header Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 px-6 py-8">
            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <!-- Profile Photo -->
                <div class="relative group">
                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-avatar.png') }}"
                             alt="Foto Profil"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer" onclick="document.getElementById('photo-input').click()">
                        <i class="fas fa-camera text-white text-lg"></i>
                    </div>
                </div>

                <!-- User Info -->
                <div class="text-center sm:text-left text-white">
                    <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                    <p class="text-cyan-100 text-lg">{{ $user->kelas }}</p>
                    <p class="text-cyan-200 text-sm">{{ $user->email }}</p>
                    <div class="mt-2 inline-flex items-center px-3 py-1 bg-cyan-600/50 rounded-full text-xs">
                        <i class="fas fa-user-graduate mr-1"></i>
                        Siswa Aktif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Update Photo Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-camera text-blue-600"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Foto Profil</h2>
                    <p class="text-sm text-gray-600">Perbarui foto profil Anda</p>
                </div>
            </div>

            <form action="{{ route('murid.profile.update') }}" method="POST" enctype="multipart/form-data" id="photo-form">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Current Photo Preview -->
                    <div class="flex justify-center">
                        <div class="w-32 h-32 rounded-xl overflow-hidden border-2 border-gray-200 shadow-inner">
                            <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-avatar.png') }}"
                                 alt="Preview"
                                 id="photo-preview"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- File Input -->
                    <div class="relative">
                        <input type="file"
                               name="profile_photo"
                               id="photo-input"
                               accept="image/jpeg,image/png,image/jpg,image/gif"
                               class="hidden"
                               onchange="previewPhoto(this)">

                        <button type="button"
                                onclick="document.getElementById('photo-input').click()"
                                class="w-full flex items-center justify-center px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl hover:border-blue-400 hover:bg-blue-50 transition-colors group">
                            <div class="text-center">
                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 group-hover:text-blue-500 mb-2"></i>
                                <p class="text-sm text-gray-600 group-hover:text-blue-600">
                                    Klik untuk pilih foto baru
                                </p>
                                <p class="text-xs text-gray-400 mt-1">
                                    JPG, PNG, GIF (Max 2MB)
                                </p>
                            </div>
                        </button>
                    </div>

                    @error('profile_photo')
                        <div class="text-red-500 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 flex items-center justify-center font-medium shadow-lg hover:shadow-xl transform hover:scale-[1.02]"
                            id="photo-submit-btn"
                            style="display: none;">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Foto
                    </button>
                </div>
            </form>
        </div>

        <!-- Update Password Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-lock text-green-600"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Ubah Password</h2>
                    <p class="text-sm text-gray-600">Perbarui password untuk keamanan akun</p>
                </div>
            </div>

            <form action="{{ route('murid.profile.password') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Current Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-key text-gray-400 mr-1"></i>
                        Password Lama
                    </label>
                    <div class="relative">
                        <input type="password"
                               name="current_password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors pr-12"
                               placeholder="Masukkan password lama"
                               required>
                        <button type="button"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                onclick="togglePassword(this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('current_password')
                        <div class="text-red-500 text-sm mt-1 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-gray-400 mr-1"></i>
                        Password Baru
                    </label>
                    <div class="relative">
                        <input type="password"
                               name="password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors pr-12"
                               placeholder="Masukkan password baru"
                               required>
                        <button type="button"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                onclick="togglePassword(this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-red-500 text-sm mt-1 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-gray-400 mr-1"></i>
                        Konfirmasi Password Baru
                    </label>
                    <div class="relative">
                        <input type="password"
                               name="password_confirmation"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors pr-12"
                               placeholder="Konfirmasi password baru"
                               required>
                        <button type="button"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                onclick="togglePassword(this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 flex items-center justify-center font-medium shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Perbarui Password
                </button>
            </form>
        </div>
    </div>

    <!-- Account Information Card -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center mb-6">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-info-circle text-purple-600"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Informasi Akun</h2>
                <p class="text-sm text-gray-600">Detail akun dan ekstrakurikuler yang diikuti</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Account Details -->
            <div class="space-y-3">
                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <i class="fas fa-user text-gray-400 w-5"></i>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">Nama Lengkap</p>
                        <p class="font-medium">{{ $user->name }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <i class="fas fa-envelope text-gray-400 w-5"></i>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-medium">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <i class="fas fa-graduation-cap text-gray-400 w-5"></i>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">Kelas</p>
                        <p class="font-medium">{{ $user->kelas }}</p>
                    </div>
                </div>
            </div>

            <!-- Ekstrakurikuler -->
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Ekstrakurikuler yang Diikuti</h3>
                <div class="space-y-2">
                    @forelse($user->ekskuls as $ekskul)
                        <div class="flex items-center p-3 bg-cyan-50 rounded-lg border border-cyan-100">
                            <div class="w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                {{ substr($ekskul->nama, 0, 1) }}
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="font-medium text-gray-800">{{ $ekskul->nama }}</p>
                                <p class="text-xs text-gray-600">{{ $ekskul->hari }} • {{ $ekskul->jam_mulai }}-{{ $ekskul->jam_selesai }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6 text-gray-500">
                            <i class="fas fa-info-circle text-2xl mb-2"></i>
                            <p>Belum mengikuti ekstrakurikuler</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('photo-preview').src = e.target.result;
            document.getElementById('photo-submit-btn').style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function togglePassword(button) {
    const input = button.parentElement.querySelector('input');
    const icon = button.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Auto-hide success messages
setTimeout(function() {
    const alerts = document.querySelectorAll('.bg-green-100');
    alerts.forEach(function(alert) {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(function() {
            alert.remove();
        }, 500);
    });
}, 3000);
</script>
@endsection
