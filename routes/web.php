<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::prefix('/admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('forget-password', [AdminAuthController::class, 'forget_password'])->name('admin.forget_password');
    Route::get('reset-password', [AdminAuthController::class, 'reset_password'])->name('admin.reset_password');
    Route::get('profile', [AdminAuthController::class, 'profile'])->name('admin.profile');

    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
});
