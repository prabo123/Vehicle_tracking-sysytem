<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;


// Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


// User Home
Route::get('/user/home', function () {
    return view('User.home');
})->name('user.home');



//------------------ Vehicle Routes------------------

// Show vehicle form
Route::get('/vehical_Details', [VehicleController::class, 'index'])->name('vehical_Details');

// Store vehicle data
Route::post('/vehical_Details', [VehicleController::class, 'store']);

// View all vehicles
Route::get('/vehicle/view', [VehicleController::class, 'view'])->name('vehicle.view');

Route::get('/vehicle-show/{id}', [VehicleController::class, 'show'])->name('vehicle.show');


// Update vehicle
Route::put('/vehical/{id}', [VehicleController::class, 'update'])->name('vehical.update');
Route::get('/vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('vehical.edit');
Route::put('/vehicle/update/{id}', [VehicleController::class, 'update'])->name('vehical.update');
Route::delete('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('vehical.destroy');



//-------------- Driver Routes-------------------------


// Show form to create driver
Route::get('/driver_Details', [DriverController::class, 'create'])->name('driver_Details');

// Store driver data
Route::post('/driver_Details', [DriverController::class, 'store'])->name('driver_Details.store');

// Edit driver form
Route::get('driver/{driver}/edit', [DriverController::class, 'edit'])->name('driver.edit');

// Update driver
Route::put('/driver/{driver}', [DriverController::class, 'update'])->name('driver.update');

// Delete driver
Route::delete('/driver/{driver}', [DriverController::class, 'destroy'])->name('driver.destroy');

// Driver View Route
Route::get('/driver/view', [DriverController::class, 'view'])->name('driver.view');





//-------------- User Signup-------------------------

Route::post('/User_signup', [UserController::class, 'store']);
Route::get('/User_signup', [UserController::class, 'create'])->name('signup.page');
return view('User_signup');


//-------------- User Login-------------------------


// Show the login form
Route::get('/User_login', [AuthController::class, 'showLogin'])->name('User_login.showLogin');

// Handle the login submission
Route::post('/User_login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/user/home', function () {
    return view('User.home');
})->middleware('auth');








// Default Redirect
Route::get('/', function () {
    return redirect()->route('user.home');
});



