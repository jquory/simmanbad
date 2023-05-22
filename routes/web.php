<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::post('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/', [AuthController::class, 'index']);

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'dashboardUser']);
    Route::get('/user/hello', function () {
        return  view('components.index', ['title' => 'Hoi']);
    });
    Route::get('/user/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'dashboardAdmin']);

    // Crud Daftar Barang
    Route::get('/admin/daftar-barang', [BarangController::class, 'index'])->name('admin.daftar-barang');
    Route::get('/admin/daftar-barang/create', [BarangController::class, 'create']);
    Route::post('/admin/daftar-barang/store', [BarangController::class, 'store']);
    Route::get('/admin/daftar-barang/{uuid}/edit', [BarangController::class, 'edit']);
    Route::put('/admin/daftar-barang/{id}', [BarangController::class, 'update']);
    Route::delete('/admin/daftar-barang/{id}', [BarangController::class, 'destroy']);

    // Crud Barang Masuk
    Route::get('/admin/barang-masuk', [BarangMasukController::class, 'index']);
    Route::get('/admin/barang-masuk/create', [BarangMasukController::class, 'create']);
    Route::get('/admin/barang-masuk/getDetail/{productName}', [BarangMasukController::class, 'getProductDetails']);
    Route::post('/admin/barang-masuk/store', [BarangMasukController::class, 'store']);
    Route::get('/admin/barang-masuk/{uuid}/edit', [BarangMasukController::class, 'edit']);
    Route::put('/admin/barang-masuk/{id}', [BarangMasukController::class, 'update']);
    Route::delete('/admin/barang-masuk/{id}', [BarangMasukController::class, 'destroy']);


    Route::get('/admin/barang-keluar', [BarangKeluarController::class, 'index']);
    Route::get('/admin/logout', [AuthController::class, 'logout']);
});