<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;



Route::get('/', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');
