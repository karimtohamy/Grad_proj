<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\HomepageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Generator\RandomGeneratorFactory;


Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/',[HomepageController::class,'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

