<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

Route::get('/', function () {
    return view('login');
});

Route::get('/drivers', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');
