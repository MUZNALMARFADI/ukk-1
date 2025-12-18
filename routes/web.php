<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/* ==========================
    DASHBOARD
========================== */
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

/* ==========================
    PROFILE USER
========================== */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* ==========================
    MENU ADMIN ONLY
========================== */
Route::middleware(['auth','role:admin'])->group(function () {

    // CRUD siswa
    Route::resource('siswa', SiswaController::class);

    // CRUD kelas
    Route::resource('kelas', KelasController::class);

    // CRUD spp
    Route::resource('spp', SppController::class);

    // CRUD petugas / admin user
    Route::resource('petugas', AdminController::class);

    // RIWAYAT pembayaran (admin bisa lihat semua)
    Route::get('pembayaran', [PembayaranController::class, 'index'])
        ->name('pembayaran.index');

    // LAPORAN PEMBAYARAN
    Route::get('laporan', [PembayaranController::class, 'laporan'])
        ->name('laporan.index');

    Route::post('laporan/cari', [LaporanController::class, 'cari'])
        ->name('laporan.cari');

    Route::get('laporan/cetak', [PembayaranController::class, 'cetak'])
        ->name('laporan.cetak');
});


/* ==========================
    MENU PEMBAYARAN
    Boleh diakses: admin, petugas, siswa
========================== */
Route::middleware(['auth','role:admin|petugas|siswa'])->group(function () {

    // FORM BAYAR (semua role bisa akses)
    Route::get('pembayaran/create', [PembayaranController::class, 'create'])
        ->name('pembayaran.create');

    // SIMPAN PEMBAYARAN (semua role bisa bayar)
    Route::post('pembayaran', [PembayaranController::class, 'store'])
        ->name('pembayaran.store');

    // HISTORY PEMBAYARAN (siswa lihat history sendiri)
    Route::get('history', [PembayaranController::class, 'history'])
        ->name('pembayaran.history');
});

// ============================================
// ROUTE AUTH (Login, Register, Reset Password)
// File ini sudah include semua route authentication
// ============================================
require __DIR__.'/auth.php';