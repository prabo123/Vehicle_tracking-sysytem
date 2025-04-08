<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AdminController;

// Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// User Home
Route::get('/user/home', function () {
    return view('User.home');
})->name('user.home');

// Vehicle Routes
Route::get('/vehical_Details', [VehicleController::class, 'index'])->name('vehical_Details');
Route::post('/vehical_Details', [VehicleController::class, 'store']);
Route::get('/vehical/{id}/edit', [VehicleController::class, 'edit'])->name('vehical.edit');
Route::put('/vehical/{id}', [VehicleController::class, 'update'])->name('vehical.update');
Route::get('/vehicle/view', [VehicleController::class, 'view'])->name('vehicle.view');

// Driver Routes
Route::get('/driver_Details', [DriverController::class, 'create'])->name('driver_Details');
Route::post('/driver_Details', [DriverController::class, 'store'])->name('driver_Details.store');
Route::get('/driver/view', [DriverController::class, 'view'])->name('driver.view');

// Default Redirect
Route::get('/', function () {
    return redirect()->route('user.home');
});
