<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

// Edit form
Route::get('/vehical/{id}/edit', [VehicleController::class, 'edit'])->name('vehical.edit');

// Update vehicle
Route::put('/vehical/{id}', [VehicleController::class, 'update'])->name('vehical.update');










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



//-------------- User Signup-------------------------

Route::post('/User_signup', [UserController::class, 'store']);
Route::get('/User_signup', [UserController::class, 'create'])->name('signup.page');
return view('User_signup');




//-------------- User Login -------------------------
Route::get('/User_login', [AuthController::class, 'showLogin'])->name('login.page');
Route::post('/User_login', [AuthController::class, 'login'])->name('login.user');






// Default Redirect
Route::get('/', function () {
    return redirect()->route('user.home');
});



