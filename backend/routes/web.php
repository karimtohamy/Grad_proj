<?php

use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/reset-password/{token}/{email}', [ResetPasswordController::class, 'showResetForm']);

Route::post('/reset-password',[ResetPasswordController::class,'resetPassword'])->name('reset.password');
