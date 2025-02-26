<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\HomepageController;
use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Generator\RandomGeneratorFactory;


Route::middleware([SetLocale::class])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware(['auth:sanctum',SetLocale::class])->group(function () {
    Route::get('/',[HomepageController::class,'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

