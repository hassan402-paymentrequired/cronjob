<?php


use App\Http\Controllers\V1\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ServiceController::class, "index"])->name("service.index");

Route::get("/service/{id}", [ServiceController::class, "getOfferForAParticularService"])->name("service.offers");
