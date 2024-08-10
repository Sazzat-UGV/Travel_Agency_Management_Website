<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\FrontAuthController;
use App\Http\Controllers\Frontend\FrontController;
use Illuminate\Support\Facades\Route;

// user route
Route::prefix('/')->group(function () {

    Route::get('', [FrontController::class, 'home'])->name('home');

    Route::get('registration', [FrontAuthController::class, 'registration'])->name('registration');
    Route::post('registration', [FrontAuthController::class, 'registration_submit'])->name('registration_submit');

    Route::get('registration_verify/{token}/{email}', [FrontAuthController::class, 'registration_verify'])->name('registration_verify');

    Route::get('login', [FrontAuthController::class, 'login'])->name('login');
    Route::get('forget-password', [FrontAuthController::class, 'forget_password'])->name('forget_password');
});

// admin route
Route::prefix('/admin')->group(function () {

    Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'loginSubmit'])->name('admin.loginSubmit');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('forget-password', [AdminAuthController::class, 'forget_password'])->name('admin.forget_password');
    Route::post('forget-password', [AdminAuthController::class, 'forget_password_submit'])->name('admin.forget_password_submit');

    Route::get('reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password'])->name('admin.reset_password');
    Route::post('reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password_submit'])->name('admin.reset_password_submit');

    Route::middleware('admin')->group(function () {

        Route::get('profile', [AdminAuthController::class, 'profile'])->name('admin.profile');
        Route::post('profile', [AdminAuthController::class, 'profile_submit'])->name('admin.profile_submit');
        Route::post('profile/image', [AdminAuthController::class, 'profile_image_submit'])->name('admin.profile_image_submit');

        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    });
});
