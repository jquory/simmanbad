<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LogAktivitasController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Route;

//Route::post('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'authenticate']);
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
// Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'dashboardUser'])->name('user.dashboard');
    Route::get('/user/logout', [AuthController::class, 'logout']);

    // Barang Masuk
    Route::get('/user/barang-masuk', [BarangMasukController::class, 'indexUser'])->name('user.barang-masuk');
    Route::get('/user/barang-masuk/create', [BarangMasukController::class, 'userCreate']);
    Route::get('/user/barang-masuk/getDetail/{id}', [BarangMasukController::class, 'getProductDetails']);
    Route::post('/user/barang-masuk/store', [BarangMasukController::class, 'userStore']);


    Route::post('/user/event/{id}/ikuti', [EventController::class, 'follow']);

    // Prestasi
    Route::get('/user/prestasi', [PrestasiController::class, 'index'])->name('user.prestasi');
    Route::get('/user/prestasi/create', [PrestasiController::class, 'create']);
    Route::get('/user/prestasi/{id}/edit', [PrestasiController::class, 'edit']);
    Route::put('/user/prestasi/{id}', [PrestasiController::class, 'update']);
    Route::delete('/user/prestasi/{id}', [PrestasiController::class, 'destroy']);
    Route::post('/user/prestasi/store', [PrestasiController::class, 'store']);

    // Jadwal
    Route::get('/user/jadwal', [JadwalController::class, 'index'])->name('user.jadwal');
    Route::put('/user/jadwal/{id}/hadir', [JadwalController::class, 'absenHadir']);
    Route::put('/user/jadwal/{id}/tidak-hadir', [JadwalController::class, 'tidakHadir']);

});

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    // Auth
    Route::get('/admin/dashboard', [HomeController::class, 'dashboardAdmin']);
    Route::get('/admin/logout', [AuthController::class, 'logout']);


    // Crud Daftar users
    Route::get('/admin/daftar-atlet', [UserController::class, 'index'])->name('admin.daftar-atlet');
    Route::get('/admin/daftar-atlet/create', [UserController::class, 'create']);
    Route::post('/admin/daftar-atlet/store', [UserController::class, 'store']);
    Route::get('/admin/daftar-atlet/{uuid}/edit', [UserController::class, 'edit']);
    Route::get('/admin/daftar-atlet/{uuid}/detil', [UserController::class, 'show']);
    Route::put('/admin/daftar-atlet/{id}', [UserController::class, 'update']);
    Route::delete('/admin/daftar-atlet/{id}', [UserController::class, 'destroy']);

    // Kriteria
    Route::get('/admin/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria');
    Route::get('/admin/hasil-analisa', [KriteriaController::class, 'result']);

    // Crud Prestasi
    Route::get('/admin/prestasi', [PrestasiController::class, 'index'])->name('admin.prestasi');
    Route::get('/admin/prestasi/create', [PrestasiController::class, 'create']);
    Route::get('/admin/prestasi/getDetail/{id}', [PrestasiController::class, 'getProductDetails']);
    Route::post('/admin/prestasi/store', [PrestasiController::class, 'store']);
    Route::get('/admin/prestasi/{id}/edit', [PrestasiController::class, 'edit']);
    Route::put('/admin/prestasi/{id}', [PrestasiController::class, 'update']);
    Route::delete('/admin/prestasi/{id}', [PrestasiController::class, 'destroy']);

    // Crud Event
    Route::get('/admin/event', [EventController::class, 'index'])->name('admin.event');
    Route::get('/admin/event/create', [EventController::class, 'create']);
    Route::get('/admin/event/getDetail/{id}', [EventController::class, 'getProductDetails']);
    Route::post('/admin/event/store', [EventController::class, 'store']);
    Route::get('/admin/event/{uuid}/edit', [EventController::class, 'edit']);
    Route::get('/admin/event/{id}/detil', [EventController::class, 'show']);
    Route::put('/admin/event/{id}', [EventController::class, 'update']);
    Route::delete('/admin/event/{id}', [EventController::class, 'destroy']);
    Route::post('/admin/event/{id}/ikuti', [EventController::class, 'follow']);

    // History Route
    Route::get('/admin/log-aktivitas', [LogAktivitasController::class, 'index']);

    // Crud Akun
    Route::get('/admin/daftar-pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna');
    Route::get('/admin/daftar-pengguna/create', [PenggunaController::class, 'create']);
    Route::post('/admin/daftar-pengguna/store', [PenggunaController::class, 'store']);
    Route::get('/admin/daftar-pengguna/{uuid}/edit', [PenggunaController::class, 'edit']);
    Route::put('/admin/daftar-pengguna/{id}', [PenggunaController::class, 'update']);
    Route::delete('/admin/daftar-pengguna/{id}', [PenggunaController::class, 'destroy']);

    // Jadwal
    Route::get('/admin/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal');
    Route::get('/admin/jadwal/create', [JadwalController::class, 'create']);
    Route::post('/admin/jadwal/store', [JadwalController::class, 'store']);
    Route::get('/admin/jadwal/{id}/edit', [JadwalController::class, 'show']);
    Route::put('/admin/jadwal/{id}', [JadwalController::class, 'update']);
    Route::delete('/admin/jadwal/{id}', [JadwalController::class, 'destroy']);

    // Transaksi 
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/admin/history-transaksi', [TransaksiController::class, 'history']);
    Route::get('/admin/transaksi/{id}/edit', [TransaksiController::class, 'show']);
    Route::put('/admin/transaksi/{id}', [TransaksiController::class, 'update']);
    Route::post('/admin/laporan-masuk-pdf', [LaporanMasukController::class, 'getPdfMasuk'])->name('pdfMasuk');
    Route::post('/admin/laporan-keluar', [LaporanMasukController::class, 'indexKeluar'])->name('laporan-keluar');
    Route::post('/admin/laporan-keluar-pdf', [LaporanMasukController::class, 'getPdfKeluar'])->name('pdfKeluar');
    Route::get('/admin/laporan-akhir', [LaporanMasukController::class, 'laporanAkhir']);
    Route::get('/admin/laporan-akhir-pdf', [LaporanMasukController::class, 'getPdfAkhir'])->name('pdfAkhir');
});