<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Event;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with vehicle, driver, and event data.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Count total number of vehicles
        $totalVehicles = Vehicle::count();

        // Count total number of drivers
        $totalDrivers = Driver::count();

        // Get count of each vehicle type (e.g., Car, Van, etc.)
        $vehicleTypes = Vehicle::select('vehicle_type')
            ->get()
            ->groupBy('vehicle_type')
            ->map->count();

        // Get all event dates formatted as 'Y-m-d' for calendar usage
        $events = Event::pluck('event_date')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        });

        // Return the admin dashboard view with compacted data
        return view('admin.dashboard', compact('totalVehicles', 'totalDrivers', 'vehicleTypes', 'events'));
    }
}
