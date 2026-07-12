<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BarangController;
use App\Http\Controllers\User\PeminjamanController;;

Route::get('/', function () {
    return view('welcome');
});
// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

// Dashboard Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');

// Dashboard User
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->name('user.dashboard');

// Daftar Barang User
Route::get('/user/barang', [BarangController::class, 'index'])
    ->name('user.barang.index');

// CRUD Peminjaman User
Route::get('/user/peminjaman', [PeminjamanController::class, 'index'])
    ->name('user.peminjaman.index');
Route::get('/user/peminjaman/create', [PeminjamanController::class, 'create'])
    ->name('user.peminjaman.create');
Route::post('/user/peminjaman', [PeminjamanController::class, 'store'])
    ->name('user.peminjaman.store');
Route::get('/user/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])
    ->name('user.peminjaman.edit');
Route::put('/user/peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])
    ->name('user.peminjaman.update');
Route::delete('/user/peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])
    ->name('user.peminjaman.destroy');

// Riwayat User
Route::get('/user/riwayat', [PeminjamanController::class, 'riwayat'])
    ->name('user.riwayat');
