<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Website Pendaftaran Magang Diskominfo Kab. Tegal
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('beranda');

// Profil Dinas
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

// Pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{pengumuman}', [PengumumanController::class, 'show'])->name('pengumuman.show');

// Registrasi Magang
Route::get('/registrasi', [RegistrasiController::class, 'create'])->name('registrasi.create');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');

// Autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard (setelah login, khusus admin/peserta)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});
