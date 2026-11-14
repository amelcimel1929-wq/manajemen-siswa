<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\IzinSiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// Head HTTP: default mengarah ke halaman siswa
Route::get('/', function () {
    return redirect()->route('admin.data-diri.table');
});

Route::prefix('admin')->as('admin.')->group(function () {

    // Data Diri (Halaman Siswa)
    Route::prefix('data-diri')->group(function () {
        Route::get('/', [DataDiriController::class, 'index'])->name('data-diri.table');
        Route::get('/tambah', [DataDiriController::class, 'create'])->name('data-diri.tambah');
        Route::post('/tambah', [DataDiriController::class, 'store'])->name('data-diri.store');
        Route::get('/update/{id}', [DataDiriController::class, 'edit'])->name('data-diri.edit');
        Route::put('/update/{dataDiri}', [DataDiriController::class, 'update'])->name('data-diri.update');
        Route::delete('/delete/{dataDiri}', [DataDiriController::class, 'destroy'])->name('data-diri.delete');
    });

    // Izin Siswa (Halaman Siswa)
    Route::prefix('izin-siswa')->group(function () {
        Route::get('/', [IzinSiswaController::class, 'index'])->name('izin-siswa.table');
        Route::get('/tambah', [IzinSiswaController::class, 'create'])->name('izin-siswa.tambah');
        Route::post('/tambah', [IzinSiswaController::class, 'store'])->name('izin-siswa.store');
        Route::get('/update/{id}', [IzinSiswaController::class, 'edit'])->name('izin-siswa.edit');
        Route::put('/update/{izinSiswa}', [IzinSiswaController::class, 'update'])->name('izin-siswa.update');
        Route::delete('/delete/{izinSiswa}', [IzinSiswaController::class, 'destroy'])->name('izin-siswa.delete');
    });

    // Nilai (Halaman Guru)
    Route::prefix('nilai')->group(function () {
        Route::get('/', [NilaiController::class, 'index'])->name('nilai.table');
        Route::get('/tambah', [NilaiController::class, 'create'])->name('nilai.tambah');
        Route::post('/tambah', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('/update/{id}', [NilaiController::class, 'edit'])->name('nilai.edit');
        Route::put('/update/{nilai}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/delete/{nilai}', [NilaiController::class, 'destroy'])->name('nilai.delete');
    });

    // Data Siswa (Halaman Guru)
    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa.table');
        Route::get('/tambah', [SiswaController::class, 'create'])->name('siswa.tambah');
        Route::post('/tambah', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/update/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/update/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/delete/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.delete');
    });

    // Alias jika diakses menggunakan format admin.produk.*
    Route::prefix('produk')->as('produk.')->group(function () {
        Route::get('/', [DataDiriController::class, 'index'])->name('table');
        Route::get('/tambah', [DataDiriController::class, 'create'])->name('tambah');
        Route::post('/tambah', [DataDiriController::class, 'store'])->name('store');
        Route::get('/update/{id}', [DataDiriController::class, 'edit'])->name('edit');
        Route::put('/update/{dataDiri}', [DataDiriController::class, 'update'])->name('update');
        Route::delete('/delete/{dataDiri}', [DataDiriController::class, 'destroy'])->name('delete');
    });

});
