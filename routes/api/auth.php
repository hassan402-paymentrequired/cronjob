<?php

use App\Http\Controllers\V1\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;




Route::middleware('guest')->group(function () {
    Route::post('/register-user', [RegisterUserController::class, 'store'])->name('user.register');
});

Route::middleware('auth')->group(function(){
    Route::post('/verify', [RegisterUserController::class, 'verifyCode'])->name('user.verify');
});
