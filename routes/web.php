<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MuridController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');

Route::get('/murid/login', [AuthController::class, 'showMuridLogin'])->name('murid.login');
Route::post('/murid/login', [AuthController::class, 'muridLogin'])->name('murid.login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Murid management
        Route::get('/murid', [AdminController::class, 'muridIndex'])->name('murid.index');
        Route::get('/murid/create', [AdminController::class, 'muridCreate'])->name('murid.create');
        Route::post('/murid', [AdminController::class, 'muridStore'])->name('murid.store');

        // Ekskul management
        Route::get('/ekskul', [AdminController::class, 'ekskulIndex'])->name('ekskul.index');
        Route::get('/ekskul/create', [AdminController::class, 'ekskulCreate'])->name('ekskul.create');
        Route::post('/ekskul', [AdminController::class, 'ekskulStore'])->name('ekskul.store');

        // Rekap presensi
        Route::get('/rekap-presensi', [AdminController::class, 'rekapPresensi'])->name('rekap.presensi');

        // Berita management
        Route::get('/berita', [AdminController::class, 'beritaIndex'])->name('berita.index');
        Route::get('/berita/create', [AdminController::class, 'beritaCreate'])->name('berita.create');
        Route::post('/berita', [AdminController::class, 'beritaStore'])->name('berita.store');
    });

    // Murid routes
    Route::prefix('murid')->name('murid.')->middleware('murid')->group(function () {
        Route::get('/dashboard', [MuridController::class, 'dashboard'])->name('dashboard');
        Route::get('/presensi', [MuridController::class, 'presensi'])->name('presensi');
        Route::post('/presensi', [MuridController::class, 'storePresensi'])->name('presensi.store');
        Route::get('/homepage', [MuridController::class, 'homepage'])->name('homepage');
    });
});
