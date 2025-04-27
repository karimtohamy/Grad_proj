<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\HomepageController;
use App\Http\Controllers\Customer\ServiceProviderController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProvider\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/forgot-password', [ResetPasswordController::class, 'forgotPassword']);
Route::middleware([SetLocale::class])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'CustomerRegister']);
});



Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{service}', [ServiceProviderController::class, 'index']);
    Route::get('/providers/{ServiceProvider}', [ServiceProviderController::class, 'show']);
    Route::get('/homepage', HomepageController::class);
});



Route::middleware(['auth:sanctum', SetLocale::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('upload-profile-image', [UserController::class, 'upload']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/confirm-booking', [BookingController::class, 'store']);
    Route::post('/create-booking', [\App\Http\Controllers\Customer\BookingController::class, 'store']);
    Route::get('/get-bookings', [\App\Http\Controllers\Customer\BookingController::class, 'index']);
    Route::get('/get-bookings/{booking}',[\App\Http\Controllers\Customer\BookingController::class, 'show']);
});
