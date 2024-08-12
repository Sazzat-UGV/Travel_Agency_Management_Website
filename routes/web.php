<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminWelcomeItemController;
use App\Http\Controllers\Frontend\FrontAuthController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

// public route
Route::prefix('/')->group(function () {

    // front page route
    Route::get('', [FrontController::class, 'home'])->name('home');
    Route::get('about', [FrontController::class, 'about'])->name('about');

    // registration route
    Route::get('registration', [FrontAuthController::class, 'registration'])->name('registration');
    Route::post('registration', [FrontAuthController::class, 'registration_submit'])->name('registration_submit');
    Route::get('registration_verify/{token}/{email}', [FrontAuthController::class, 'registration_verify'])->name('registration_verify');

    // auth route
    Route::get('login', [FrontAuthController::class, 'login'])->name('login');
    Route::post('login', [FrontAuthController::class, 'login_submit'])->name('login_submit');
    Route::get('logout', [FrontAuthController::class, 'logout'])->name('logout');

    // forget password route
    Route::get('forget-password', [FrontAuthController::class, 'forget_password'])->name('forget_password');
    Route::post('forget-password', [FrontAuthController::class, 'forget_password_submit'])->name('forget_password_submit');

    // reset password route
    Route::get('reset-password/{token}/{email}', [FrontAuthController::class, 'reset_password'])->name('reset_password');
    Route::post('reset-password/{token}/{email}', [FrontAuthController::class, 'reset_password_submit'])->name('reset_password_submit');

});

// user route
Route::prefix('user/')->middleware('auth')->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // profile route
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile', [UserController::class, 'profile_submit'])->name('profile_submit');

});

// admin route
Route::prefix('/admin')->group(function () {

    // auth routes
    Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'loginSubmit'])->name('admin.loginSubmit');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // forget password routes
    Route::get('forget-password', [AdminAuthController::class, 'forget_password'])->name('admin.forget_password');
    Route::post('forget-password', [AdminAuthController::class, 'forget_password_submit'])->name('admin.forget_password_submit');

    // reset password routes
    Route::get('reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password'])->name('admin.reset_password');
    Route::post('reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password_submit'])->name('admin.reset_password_submit');

    Route::middleware('admin')->group(function () {
        // profile route
        Route::get('profile', [AdminAuthController::class, 'profile'])->name('admin.profile');
        Route::post('profile', [AdminAuthController::class, 'profile_submit'])->name('admin.profile_submit');
        Route::post('profile/image', [AdminAuthController::class, 'profile_image_submit'])->name('admin.profile_image_submit');

        // dashboard route
        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

        // resource controller
        Route::resource('slider', AdminSliderController::class);

        // welcome item route
        Route::get('welcome-item/index', [AdminWelcomeItemController::class, 'index'])->name('admin.welcomeItemIndex');
        Route::post('welcome-item/update', [AdminWelcomeItemController::class, 'update'])->name('admin.welcomeItemUpdate');
    });
});
