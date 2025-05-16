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


Route::get('/vehical_Details', [VehicleController::class, 'index'])->name('vehical_Details');// Show vehicle form
Route::post('/vehical_Details', [VehicleController::class, 'store']);// Store vehicle data
Route::get('/vehicle/view', [VehicleController::class, 'view'])->name('vehicle.view');// View all vehicles
Route::get('/vehicle-show/{id}', [VehicleController::class, 'show'])->name('vehicle.show');
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle_Details');


// Update vehicle
Route::put('/vehical/{id}', [VehicleController::class, 'update'])->name('vehical.update');
Route::get('/vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('vehical.edit');
Route::put('/vehicle/update/{id}', [VehicleController::class, 'update'])->name('vehical.update');
Route::delete('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('vehical.destroy');
Route::resource('vehical', VehicleController::class);



//-------------- Driver Routes-------------------------

// Show driver form
Route::get('/driver_Details', [DriverController::class, 'index'])->name('driver_Details');
// Store driver data
Route::post('/driver_Details', [DriverController::class, 'store'])->name('driver.store');
// View all drivers
Route::get('/driver/', [DriverController::class, 'view'])->name('driver.view');
// Show single driver
Route::get('/driver/show/{id}', [DriverController::class, 'show'])->name('driver.show');
// Edit driver form
Route::get('/driver/edit/{id}', [DriverController::class, 'edit'])->name('driver.edit');
// Update driver (two versions provided like vehicle routes, pick one preferred or keep both if needed)
Route::put('/driver/{id}', [DriverController::class, 'update'])->name('driver.update');
Route::put('/driver/update/{id}', [DriverController::class, 'update'])->name('driver.update');
// Delete driver
Route::delete('/driver/delete/{id}', [DriverController::class, 'destroy'])->name('driver.destroy');












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



