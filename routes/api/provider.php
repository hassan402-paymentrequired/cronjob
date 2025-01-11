<?php

use App\Http\Controllers\Booking\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ServiceProvider\SeviceProviderController;


Route::middleware(['auth'])->group(function () {
    Route::post("/", [SeviceProviderController::class, 'createProvider'])->name('provider.create');
    Route::post("/offer", [SeviceProviderController::class, 'createProviderServiceOffer'])->name('provider.offer');
    Route::post('/working-hour', [SeviceProviderController::class, 'storeWorkingHour'])->name('provider.working-hour');
    Route::get("/category", [SeviceProviderController::class, 'getAllCategories'])->name('provider.categories');
    Route::get("/services-offer", [SeviceProviderController::class, 'getAllServicesOfferedByProvider'])->name('provider.services');

    Route::prefix('/bookings')->group(function () {
        Route::get("/booking", [BookingController::class, 'getAllVendorBookings'])->name("booking");
    });
});
