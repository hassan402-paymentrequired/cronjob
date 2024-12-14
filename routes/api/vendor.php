<?php

use App\Http\Controllers\V1\Auth\CreateVendorController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::post('/create', [CreateVendorController::class, 'store'])->name('vendor.create');
});
