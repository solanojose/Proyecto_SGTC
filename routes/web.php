<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('login');
});

// LOGIN 
Route::get('/login', [LoginController::class, 'formLogin'])->name('formLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ADMIN {

// CONDUCTOR
Route::get('/Admin/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/Admin/drivers/{id}/edit', [DriverController::class, 'driverId'])->name('drivers.edit');
Route::put('/Admin/drivers/{id}', [DriverController::class, 'update'])->name('drivers.update'); 
Route::delete('/Admin/drivers/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy'); 
Route::get('/Admin/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/Admin/drivers', [DriverController::class, 'store'])->name('drivers.store');
// CLIENTE
Route::get('/cities/{id}', [CustomerController::class, 'citiesByDepartament']);
Route::get('/Admin/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/Admin/customers', [CustomerController::class, 'store'])->name('customers.store');
// VEHICULO   
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// }





Route::get('/customers/profile', [CustomerController::class, 'profile'])->name('customers.profile');







