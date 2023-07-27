<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\PenggunaController;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\Route;

Route::post('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/', [AuthController::class, 'index']);

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'dashboardUser']);
    Route::get('/user/logout', [AuthController::class, 'logout']);

    // Barang Masuk
    Route::get('/user/barang-masuk', [BarangMasukController::class, 'indexUser'])->name('user.barang-masuk');
    Route::get('/user/barang-masuk/create', [BarangMasukController::class, 'userCreate']);
    Route::get('/user/barang-masuk/getDetail/{id}', [BarangMasukController::class, 'getProductDetails']);
    Route::post('/user/barang-masuk/store', [BarangMasukController::class, 'userStore']);

    // Barang Keluar

    Route::get('/user/barang-keluar', [BarangKeluarController::class, 'indexUser'])->name('user.barang-keluar');
    Route::get('/user/barang-keluar/create', [BarangKeluarController::class, 'userCreate']);
    Route::get('/user/barang-keluar/getDetail/{id}', [BarangKeluarController::class, 'getProductDetails']);
    Route::post('/user/barang-keluar/store', [BarangKeluarController::class, 'userStore']);
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    // Auth
    Route::get('/admin/dashboard', [HomeController::class, 'dashboardAdmin']);
    Route::get('/admin/logout', [AuthController::class, 'logout']);


    // Crud Daftar Barang
    Route::get('/admin/daftar-barang', [BarangController::class, 'index'])->name('admin.daftar-barang');
    Route::get('/admin/daftar-barang/create', [BarangController::class, 'create']);
    Route::post('/admin/daftar-barang/store', [BarangController::class, 'store']);
    Route::get('/admin/daftar-barang/{uuid}/edit', [BarangController::class, 'edit']);
    Route::put('/admin/daftar-barang/{id}', [BarangController::class, 'update']);
    Route::delete('/admin/daftar-barang/{id}', [BarangController::class, 'destroy']);

    // Crud Barang Masuk
    Route::get('/admin/barang-masuk', [BarangMasukController::class, 'index'])->name('admin.barang-masuk');
    Route::get('/admin/barang-masuk/create', [BarangMasukController::class, 'create']);
    Route::get('/admin/barang-masuk/getDetail/{id}', [BarangMasukController::class, 'getProductDetails']);
    Route::post('/admin/barang-masuk/store', [BarangMasukController::class, 'store']);
    Route::get('/admin/barang-masuk/{uuid}/edit', [BarangMasukController::class, 'edit']);
    Route::put('/admin/barang-masuk/{id}', [BarangMasukController::class, 'update']);
    Route::delete('/admin/barang-masuk/{id}', [BarangMasukController::class, 'destroy']);

    // Crud Barang Keluar
    Route::get('/admin/barang-keluar', [BarangKeluarController::class, 'index'])->name('admin.barang-keluar');
    Route::get('/admin/barang-keluar/create', [BarangKeluarController::class, 'create']);
    Route::get('/admin/barang-keluar/getDetail/{id}', [BarangKeluarController::class, 'getProductDetails']);
    Route::post('/admin/barang-keluar/store', [BarangKeluarController::class, 'store']);
    Route::get('/admin/barang-keluar/{uuid}/edit', [BarangKeluarController::class, 'edit']);
    Route::put('/admin/barang-keluar/{id}', [BarangKeluarController::class, 'update']);
    Route::delete('/admin/barang-keluar/{id}', [BarangKeluarController::class, 'destroy']);

    // History Route
    Route::get('/admin/history', [HistoryController::class, 'index']);

    // Crud Akun
    Route::get('/admin/daftar-pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna');
    Route::get('/admin/daftar-pengguna/create', [PenggunaController::class, 'create']);
    Route::post('/admin/daftar-pengguna/store', [PenggunaController::class, 'store']);
    Route::get('/admin/daftar-pengguna/{uuid}/edit', [PenggunaController::class, 'edit']);
    Route::put('/admin/daftar-pengguna/{id}', [PenggunaController::class, 'update']);
    Route::delete('/admin/daftar-pengguna/{id}', [PenggunaController::class, 'destroy']);

    // Laporan
    Route::get('/admin/laporan-masuk', [LaporanMasukController::class, 'index']);
    Route::get('/admin/laporan-masuk-pdf', [LaporanMasukController::class, 'getPdfMasuk'])->name('pdfMasuk');
    
});