<?php

use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBlogCategoryController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCounterItemController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminTeamMemberController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminTourController;
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
    Route::get('team_members', [FrontController::class, 'team_members'])->name('team_members');
    Route::get('team_member/{slug}', [FrontController::class, 'team_member'])->name('team_member');
    Route::get('faq', [FrontController::class, 'faq'])->name('faq');
    Route::get('blog', [FrontController::class, 'blog'])->name('blog');
    Route::get('blog_details/{slug}', [FrontController::class, 'blog_details'])->name('blog_details');
    Route::get('category/{slug}', [FrontController::class, 'category'])->name('category');
    Route::get('destinations', [FrontController::class, 'destinations'])->name('destinations');
    Route::get('destination/{slug}', [FrontController::class, 'destination'])->name('destination');
    Route::get('package/{slug}', [FrontController::class, 'package'])->name('package');
    Route::post('package/inquiry{id}', [FrontController::class, 'package_inquiry'])->name('package_inquiry');
    Route::post('review/submit', [FrontController::class, 'review_submit'])->name('review_submit');
    Route::get('packages', [FrontController::class, 'packages'])->name('packages');

    // paypal payment routes
    Route::post('payment', [FrontController::class, 'payment'])->name('payment');
    Route::get('paypal/success', [FrontController::class, 'paypal_success'])->name('paypal_success');
    Route::get('paypal/cancel', [FrontController::class, 'paypal_cancel'])->name('paypal_cancel');
    Route::get('stripe/success', [FrontController::class, 'stripe_success'])->name('stripe_success');
    Route::get('stripe/cancel', [FrontController::class, 'stripe_cancel'])->name('stripe_cancel');

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
    // booking route
    Route::get('booking', [UserController::class, 'booking'])->name('booking');
    Route::get('tour/invoice/{invoice_no}', [UserController::class, 'user_invoice'])->name('user_invoice');
    // review route
    Route::get('review/index', [UserController::class, 'index'])->name('reviewIndex');

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
        Route::resource('feature', AdminFeatureController::class);
        Route::resource('testimonial', AdminTestimonialController::class);
        Route::resource('team_member', AdminTeamMemberController::class);
        Route::resource('faq', AdminFaqController::class);
        Route::resource('blog_category', AdminBlogCategoryController::class);
        Route::resource('blog', AdminBlogController::class);
        Route::resource('destination', AdminDestinationController::class);
        Route::resource('package', AdminPackageController::class);
        Route::resource('amenity', AdminAmenityController::class);
        Route::resource('tour', AdminTourController::class);

        // welcome item route
        Route::get('welcome-item/index', [AdminWelcomeItemController::class, 'index'])->name('admin.welcomeItemIndex');
        Route::post('welcome-item/update', [AdminWelcomeItemController::class, 'update'])->name('admin.welcomeItemUpdate');

        // counter item route
        Route::get('counter-item/index', [AdminCounterItemController::class, 'index'])->name('admin.counterItemIndex');
        Route::post('counter-item/update', [AdminCounterItemController::class, 'update'])->name('admin.counterItemUpdate');

        // destination photo route
        Route::get('destination_photos/{id}', [AdminDestinationController::class, 'destination_photos'])->name('admin.destination_photos');
        Route::post('destination_photos/{id}', [AdminDestinationController::class, 'destination_photo_submit'])->name('admin.destination_photo_submit');
        Route::delete('destination_photos/{id}', [AdminDestinationController::class, 'destination_photo_delete'])->name('admin.destination_photo_delete');

        // destination video route
        Route::get('destination_videos/{id}', [AdminDestinationController::class, 'destination_videos'])->name('admin.destination_videos');
        Route::post('destination_videos/{id}', [AdminDestinationController::class, 'destination_video_submit'])->name('admin.destination_video_submit');
        Route::delete('destination_videos/{id}', [AdminDestinationController::class, 'destination_video_delete'])->name('admin.destination_video_delete');

        // package amenity route
        Route::get('package_amenity/{id}', [AdminPackageController::class, 'package_amenity'])->name('admin.package_amenity');
        Route::post('package_amenity/{id}', [AdminPackageController::class, 'package_amenity_submit'])->name('admin.package_amenity_submit');
        Route::delete('package_amenity/{id}', [AdminPackageController::class, 'package_amenity_delete'])->name('admin.package_amenity_delete');

        // package itinerary route
        Route::get('package_itinerary/{id}', [AdminPackageController::class, 'package_itinerary'])->name('admin.package_itinerary');
        Route::post('package_itinerary/{id}', [AdminPackageController::class, 'package_itinerary_submit'])->name('admin.package_itinerary_submit');
        Route::delete('package_itinerary/{id}', [AdminPackageController::class, 'package_itinerary_delete'])->name('admin.package_itinerary_delete');

        // package photos route
        Route::get('package_photos/{id}', [AdminPackageController::class, 'package_photos'])->name('admin.package_photos');
        Route::post('package_photos/{id}', [AdminPackageController::class, 'package_photos_submit'])->name('admin.package_photos_submit');
        Route::delete('package_photos/{id}', [AdminPackageController::class, 'package_photos_delete'])->name('admin.package_photos_delete');

        // package videos route
        Route::get('package_videos/{id}', [AdminPackageController::class, 'package_videos'])->name('admin.package_videos');
        Route::post('package_videos/{id}', [AdminPackageController::class, 'package_videos_submit'])->name('admin.package_videos_submit');
        Route::delete('package_videos/{id}', [AdminPackageController::class, 'package_videos_delete'])->name('admin.package_videos_delete');

        // package faqs route
        Route::get('package_faqs/{id}', [AdminPackageController::class, 'package_faqs'])->name('admin.package_faqs');
        Route::post('package_faqs/{id}', [AdminPackageController::class, 'package_faqs_submit'])->name('admin.package_faqs_submit');
        Route::delete('package_faqs/{id}', [AdminPackageController::class, 'package_faqs_delete'])->name('admin.package_faqs_delete');

        // tour booking route
        Route::get('tour/booking/{tour_id}/{package_id}', [AdminTourController::class, 'tour_booking'])->name('admin.tour_booking');
        Route::delete('tour/booking/{booking_id}', [AdminTourController::class, 'tour_booking_delete'])->name('admin.tour_booking_delete');
        Route::get('tour/invoice/{invoice_no}', [AdminTourController::class, 'tour_invoice'])->name('admin.tour_invoice');

        // review route
        Route::get('review/index', [AdminReviewController::class, 'index'])->name('admin.reviewIndex');
        Route::delete('review/delete/{id}', [AdminReviewController::class, 'delete'])->name('admin.reviewDelete');

        // setting route
        Route::get('setting/index', [AdminSettingController::class, 'index'])->name('admin.settingIndex');
        Route::post('setting/update', [AdminSettingController::class, 'update'])->name('admin.settingUpdate');
    });
});
