<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Dummy data for testing
        $totalVehicles = 10;
        $totalDrivers = 5;
        $vehicleTypes = collect([
            'Car' => 4,
            'Van' => 2,
            'Truck' => 3,
            'Bus' => 1
        ]);

        return view('Admin.dashboard', compact('totalVehicles', 'totalDrivers', 'vehicleTypes'));
    }
}


