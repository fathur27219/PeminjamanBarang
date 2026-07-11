<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Dashboard Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');

// Dashboard User
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->name('user.dashboard');