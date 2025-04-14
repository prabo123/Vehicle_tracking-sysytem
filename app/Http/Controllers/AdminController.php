<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Event;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Count vehicles and drivers
        $totalVehicles = Vehicle::count();
        $totalDrivers = Driver::count();

        // Get vehicle types count grouped
        $vehicleTypes = Vehicle::select('vehicle_type')
            ->get()
            ->groupBy('vehicle_type')
            ->map->count();

        // Fetch all event dates as array of strings for the calendar
        $events = Event::pluck('event_date')->toArray();

        // Pass everything to the view
        return view('Admin.dashboard', compact('totalVehicles', 'totalDrivers', 'vehicleTypes', 'events'));
    }
}


