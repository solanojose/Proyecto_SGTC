<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('login');
});


Route::get('/drivers', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');

Route::get('/cities/{id}', [CustomerController::class, 'citiesByDepartament']);
Route::get('/customers', [CustomerController::class,'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class,'store'])->name('customers.store');