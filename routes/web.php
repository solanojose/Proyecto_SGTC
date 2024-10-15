<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('login');
});


Route::get('/login', [LoginController::class, 'formLogin'])->name('formLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/Admin/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/Admin/drivers', [DriverController::class, 'store'])->name('drivers.store');


Route::get('/cities/{id}', [CustomerController::class, 'citiesByDepartament']);
Route::get('/Admin/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/Admin/customers', [CustomerController::class, 'store'])->name('customers.store');


Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');






Route::get('/customers/profile', [CustomerController::class, 'profile'])->name('customers.profile');







