<?php

use App\Http\Controllers\backend\application\ApplicationController;
use App\Http\Controllers\backend\auth\AuthController;
use App\Http\Controllers\backend\form\FormController;
use App\Http\Controllers\backend\mailadresleri\MailAdresleriController;
use App\Http\Controllers\backend\student\StudentController;
use App\Http\Controllers\backend\user\UserController;
use App\Http\Controllers\frontend\CarController;
use App\Http\Controllers\frontend\CleaningController;
use App\Http\Controllers\frontend\TechnicalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function (){ return view('frontend.index'); })->name('request.index');
Route::get('/car-request', function (){ return view('frontend.car-form'); })->name('request.car');
Route::post('/car/store',[CarController::class,'store'])->name('car.store');

Route::get('/technical-request', function (){ return view('frontend.technical-form'); })->name('request.technical');
Route::post('/technical/store',[TechnicalController::class,'store'])->name('technical.store');


Route::get('/cleaning-request', function (){ return view('frontend.cleaning-form'); })->name('request.cleaning');
Route::post('/cleaning/store',[CleaningController::class,'store'])->name('cleaning.store');

Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login-submit',[AuthController::class,'login_submit'])->name('auth.login-submit');
Route::get('/reset-password',[AuthController::class,'reset_password_page'])->name('auth.reset_password');
Route::post('/reset-password-link',[AuthController::class,'reset_password_link'])->name('auth.reset-password-link');
Route::get('/admin/reset-password/{token}/{email}',[AuthController::class,'reset_password'])->name('auth.reset_password_link');
Route::post('/reset-password-submit',[AuthController::class,'reset_password_submit'])->name('auth.reset_password_submit');



Route::middleware('auth')->group(function (){
    Route::prefix('dashboard')->group(function(){
        Route::get('/',[AuthController::class,'index'])->name('auth.index');
        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');


        Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
        Route::post('/profile/profile-image-update',[UserController::class,'profile_image_update'])->name('users.profile.image.update');
        Route::post('/profile/profile-information-update',[UserController::class,'profile_information_update'])->name('users.profile.information.update');
        Route::post('/profile/profile-password-update',[UserController::class,'profile_password_update'])->name('users.profile.password.update');

        Route::get('/users/create',[UserController::class,'create'])->name('users.create')->middleware('adminStatus');
        Route::post('/users/store',[UserController::class,'store'])->name('users.store')->middleware('adminStatus');
        Route::get('/users/index',[UserController::class,'index'])->name('users.index')->middleware('adminStatus');
        Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete')->middleware('adminStatus');
        Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit')->middleware('adminStatus');
        Route::post('/user/image-update',[UserController::class,'image_update'])->name('users.image.update')->middleware('adminStatus');
        Route::post('/user/information-update',[UserController::class,'information_update'])->name('users.information.update')->middleware('adminStatus');
        Route::post('/user/password-update',[UserController::class,'password_update'])->name('users.password.update')->middleware('adminStatus');

        Route::get('/mail/index',[MailAdresleriController::class,'index'])->name('mail.index');
        Route::post('/mail/store',[MailAdresleriController::class,'store'])->name('mail.store');
        Route::get('/mail/delete/{id}',[MailAdresleriController::class,'delete'])->name('mail.delete');
    });
});
