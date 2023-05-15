<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/admin/hello', function () {
        return  view('components.index', ['title' => 'Hoi']);
    });
    Route::get('/admin/logout', [AuthController::class, 'logout']);

});