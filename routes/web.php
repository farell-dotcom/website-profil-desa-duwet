<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiDesaController;
use App\Http\Controllers\StrukturDesaController;
use App\Http\Controllers\PetaDesaController;
use App\Http\Controllers\KontakDesaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\InformasiDesaAdminController;
use App\Http\Controllers\Admin\StrukturDesaAdminController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\Admin\UmkmAdminController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\PengaduanAdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ==========================
// HALAMAN PUBLIK (tanpa login)
// ==========================

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/informasi-desa', [InformasiDesaController::class, 'index'])->name('informasi.index');

Route::get('/struktur-desa', [StrukturDesaController::class, 'index'])->name('struktur.index');

Route::get('/peta-desa', [PetaDesaController::class, 'index'])->name('peta.index');

Route::get('/kontak-desa', [KontakDesaController::class, 'index'])->name('kontak.index');

Route::get('/berita', [BeritaController::class, 'publicIndex'])->name('berita.public.index');

Route::get('/berita/{berita}', [BeritaController::class, 'publicShow'])->name('berita.public.show');

Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');

Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');

Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// ==========================
// LOGIN / LOGOUT
// ==========================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// RESET PASSWORD
// ==========================

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ==========================
// PANEL ADMIN (perlu login, role admin & super_admin)
// ==========================

Route::middleware(['role:admin,super_admin'])->prefix('adminduwet')->name('admin.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/informasi', [InformasiDesaAdminController::class, 'edit'])->name('informasi.edit');
    Route::put('/informasi', [InformasiDesaAdminController::class, 'update'])->name('informasi.update');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    Route::get('/struktur', [StrukturDesaAdminController::class, 'index'])->name('struktur.index');
    Route::get('/struktur/create', [StrukturDesaAdminController::class, 'create'])->name('struktur.create');
    Route::post('/struktur', [StrukturDesaAdminController::class, 'store'])->name('struktur.store');
    Route::get('/struktur/{struktur}/edit', [StrukturDesaAdminController::class, 'edit'])->name('struktur.edit');
    Route::put('/struktur/{struktur}', [StrukturDesaAdminController::class, 'update'])->name('struktur.update');
    Route::delete('/struktur/{struktur}', [StrukturDesaAdminController::class, 'destroy'])->name('struktur.destroy');

    Route::get('/umkm', [UmkmAdminController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/create', [UmkmAdminController::class, 'create'])->name('umkm.create');
    Route::post('/umkm', [UmkmAdminController::class, 'store'])->name('umkm.store');
    Route::get('/umkm/{umkm}/edit', [UmkmAdminController::class, 'edit'])->name('umkm.edit');
    Route::put('/umkm/{umkm}', [UmkmAdminController::class, 'update'])->name('umkm.update');
    Route::delete('/umkm/{umkm}', [UmkmAdminController::class, 'destroy'])->name('umkm.destroy');

    Route::get('/pengaduan', [PengaduanAdminController::class, 'index'])->name('pengaduan.index');
    Route::put('/pengaduan/{pengaduan}', [PengaduanAdminController::class, 'updateStatus'])->name('pengaduan.update');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanAdminController::class, 'destroy'])->name('pengaduan.destroy');
});

// ==========================
// KELOLA AKUN ADMIN (khusus super_admin)
// ==========================

Route::middleware(['role:super_admin'])->prefix('adminduwet/akun')->name('admin.akun.')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/', [AdminController::class, 'store'])->name('store');
    Route::delete('/{user}', [AdminController::class, 'destroy'])->name('destroy');
});