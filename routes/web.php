<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TripController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vehicles', VehicleController::class)->except(['edit', 'update', 'show']);
Route::resource('drivers', DriverController::class)->except(['edit', 'update', 'show']);
Route::resource('trips', TripController::class)->except(['show', 'edit', 'update']);
Route::get('trips/create/step-two', [TripController::class, 'createStepTwo'])->name('trips.create.step.two');
Route::get('trips/create/step-three', [TripController::class, 'createStepThree'])->name('trips.create.step.three');