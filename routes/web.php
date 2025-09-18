<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [HomeController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/ekstrakurikuler', [HomeController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

// Auth routes
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::get('/murid/login', [AuthController::class, 'showMuridLogin'])->name('murid.login');
Route::post('/murid/login', [AuthController::class, 'muridLogin'])->name('murid.login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Murid management
    Route::get('/murid', [AdminController::class, 'muridIndex'])->name('murid.index');
    Route::get('/murid/create', [AdminController::class, 'muridCreate'])->name('murid.create');
    Route::post('/murid', [AdminController::class, 'muridStore'])->name('murid.store');
    Route::get('/murid/{id}/edit', [AdminController::class, 'muridEdit'])->name('murid.edit');
    Route::put('/murid/{id}', [AdminController::class, 'muridUpdate'])->name('murid.update');
    Route::delete('/murid/{id}', [AdminController::class, 'muridDestroy'])->name('murid.destroy');
    Route::post('/murid/bulk-delete', [AdminController::class, 'bulkDeleteMurid'])->name('murid.bulk-delete');

    // Ekskul management
    Route::get('/ekskul', [AdminController::class, 'ekskulIndex'])->name('ekskul.index');
    Route::get('/ekskul/create', [AdminController::class, 'ekskulCreate'])->name('ekskul.create');
    Route::post('/ekskul', [AdminController::class, 'ekskulStore'])->name('ekskul.store');
    Route::get('/ekskul/{id}/edit', [AdminController::class, 'ekskulEdit'])->name('ekskul.edit');
    Route::put('/ekskul/{id}', [AdminController::class, 'ekskulUpdate'])->name('ekskul.update');
    Route::delete('/ekskul/{id}', [AdminController::class, 'ekskulDestroy'])->name('ekskul.destroy');
    Route::post('/ekskul/bulk-delete', [AdminController::class, 'bulkDeleteEkskul'])->name('ekskul.bulk-delete');

    // Berita management
    Route::get('/berita', [AdminController::class, 'beritaIndex'])->name('berita.index');
    Route::get('/berita/create', [AdminController::class, 'beritaCreate'])->name('berita.create');
    Route::post('/berita', [AdminController::class, 'beritaStore'])->name('berita.store');
    Route::get('/berita/{id}/edit', [AdminController::class, 'beritaEdit'])->name('berita.edit');
    Route::put('/berita/{id}', [AdminController::class, 'beritaUpdate'])->name('berita.update');
    Route::delete('/berita/{id}', [AdminController::class, 'beritaDestroy'])->name('berita.destroy');

    // Rekap presensi
    Route::get('/rekap/presensi', [AdminController::class, 'rekapPresensi'])->name('rekap.presensi');
    Route::get('/rekap/export', [AdminController::class, 'exportPresensi'])->name('rekap.export');

    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
});

// Murid routes
Route::middleware(['auth', 'murid'])->prefix('murid')->name('murid.')->group(function () {
    Route::get('/dashboard', [MuridController::class, 'dashboard'])->name('dashboard');
    Route::get('/presensi', [MuridController::class, 'presensi'])->name('presensi');
    Route::post('/presensi', [MuridController::class, 'storePresensi'])->name('presensi.store');
    Route::get('/homepage', [MuridController::class, 'homepage'])->name('homepage');
    Route::get('/profile', [MuridController::class, 'profile'])->name('profile');
    Route::put('/profile', [MuridController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [MuridController::class, 'updatePassword'])->name('profile.password');
});

// General Profile routes (if needed for other purposes)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});