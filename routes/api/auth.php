<?php

use App\Http\Controllers\V1\Auth\AuthenticateUserController;
use App\Http\Controllers\V1\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;




Route::middleware('guest')->group(function () {

    Route::group(['as' => 'customer'], function () {
    Route::post('/register-user', [RegisterUserController::class, 'store'])->name('user.register');
    Route::post('/login', [AuthenticateUserController::class, 'login'])->name('user.login');
    });

    Route::group(['as' => 'provider'], function () {
    Route::post('/login-provider', [AuthenticateUserController::class, 'authenticateProvider'])->name('provider.login');
    });
});

Route::middleware('auth')->group(function(){
    Route::post('/verify-account', [RegisterUserController::class, 'verifyCode'])->name('user.verify');
    Route::post('/logout', [AuthenticateUserController::class, 'logout'])->name('user.logout');
    Route::get("/user", [AuthenticateUserController::class, "authenticatedUser"])->name("user.index");
    Route::post("/resend-code", [RegisterUserController::class, "requestNewOtp"])->name("user.resend.code");
});
