<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalVehicles = Vehicle::count();
        $totalDrivers = Driver::count(); // Assuming you have a Driver model

        // Pie chart data: count of each vehicle type
        $vehicleTypes = Vehicle::selectRaw('vehicle_type, COUNT(*) as count')
            ->groupBy('vehicle_type')
            ->pluck('count', 'vehicle_type');

        return view('dashboard', compact('totalVehicles', 'totalDrivers', 'vehicleTypes'));
        
    }
}
