<?php

use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\mailadresleri\MailAdresleriController;
use App\Http\Controllers\Backend\user\UserController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\CleaningController;
use App\Http\Controllers\frontend\DowntownController;
use App\Http\Controllers\Frontend\FoodController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ITController;
use App\Http\Controllers\Frontend\TechnicalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('request.index');

Route::prefix('cars')->group(function () {
    Route::get('/request', [CarController::class, 'index'])->name('frontend.request-car.index');
    Route::post('/request', [CarController::class, 'store'])->name('frontend.request-car.store');
});

Route::prefix('technical')->group(function () {
    Route::get('/request', [TechnicalController::class, 'index'])->name('frontend.request-technical.index');
    Route::post('/request', [TechnicalController::class, 'store'])->name('frontend.request-technical.store');
});

Route::prefix('foods')->group(function() {
    Route::get('/request', [FoodController::class, 'create'])->name('frontend.request-food.index');
    Route::post('/request', [FoodController::class, 'store'])->name('frontend.request-food.store');
});

Route::prefix('it')->group(function () {
    Route::get('/request', [ITController::class, 'index'])->name('frontend.request-it.index');
    Route::post('/request', [ITController::class, 'store'])->name('frontend.request-it.store');
});

Route::prefix('cleaning')->group(function () {
    Route::get('/request', [CleaningController::class, 'index'])->name('frontend.request-cleaning.index');
    Route::post('/request',[CleaningController::class,'store'])->name('frontend.request-cleaning.store');
});


Route::prefix('downtown')->group(function () {
    Route::get('/request', [DowntownController::class, 'index'])->name('frontend.request-downtown.index');
    Route::post('/request',[DowntownController::class,'store'])->name('frontend.request-downtown.store');
});

Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login',[AuthController::class,'login_submit'])->name('auth.login-submit');
Route::get('/reset-password',[AuthController::class,'reset_password_page'])->name('auth.reset_password');
Route::post('/reset-password-link',[AuthController::class,'reset_password_link'])->name('auth.reset-password-link');
Route::get('/admin/reset-password/{token}/{email}',[AuthController::class,'reset_password'])->name('auth.reset_password_link');
Route::post('/reset-password-submit',[AuthController::class,'reset_password_submit'])->name('auth.reset_password_submit');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('/',[AuthController::class,'index'])->name('auth.index');
        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');

        Route::prefix('profile')->group(function () {
            Route::get('/',[UserController::class,'profile'])->name('user.profile');
            Route::post('/image-update',[UserController::class,'profile_image_update'])->name('users.profile.image.update');
            Route::post('/information-update',[UserController::class,'profile_information_update'])->name('users.profile.information.update');
            Route::post('/password-update',[UserController::class,'profile_password_update'])->name('users.profile.password.update');
        });

        Route::prefix('users')->middleware('adminRole')->group(function () {
            Route::get('/create',[UserController::class, 'create'])->name('users.create');
            Route::post('/store',[UserController::class, 'store'])->name('users.store');
            Route::get('/index',[UserController::class, 'index'])->name('users.index');
            Route::get('/delete/{id}',[UserController::class, 'delete'])->name('users.delete');
            Route::get('/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
            Route::post('/image-update',[UserController::class, 'image_update'])->name('users.image.update');
            Route::post('/information-update',[UserController::class, 'information_update'])->name('users.information.update');
            Route::post('/password-update',[UserController::class, 'password_update'])->name('users.password.update');
        });

        Route::prefix('mail')->group(function () {
            Route::get('/index',[MailAdresleriController::class,'index'])->name('mail.index');
            Route::post('/store',[MailAdresleriController::class,'store'])->name('mail.store');
            Route::get('/delete/{id}',[MailAdresleriController::class,'delete'])->name('mail.delete');
        });
    });
});
