<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VehicleController;
use App\Models\Customer;

Route::get('/', function () {
    return view('login');
});

// LOGIN 
Route::get('/login', [LoginController::class, 'formLogin'])->name('formLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ADMIN {

// CONDUCTOR
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/drivers/{id}/edit', [DriverController::class, 'driverId'])->name('drivers.edit');
Route::put('/drivers/{id}', [DriverController::class, 'update'])->name('drivers.update'); 
Route::delete('/drivers/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy'); 
Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');
// CLIENTE
Route::get('/cities/{id}', [CustomerController::class, 'citiesByDepartament']);
Route::get('/customers', [CustomerController::class,'index'])->name('customers.index');
Route::get('/customers/{id}/edit', [CustomerController::class,'customerId'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class,'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class,'destroy'])->name('customers.destroy');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
// VEHICULO   
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// }



// CUSTOMER {

Route::get('/customers/profile', [CustomerController::class, 'profile'])->name('customers.profile');

// }


// DRIVER{

Route::get('/drivers/profile', [DriverController::class,'profile'])->name('drivers.profile');

// }

