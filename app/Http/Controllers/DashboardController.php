<?php
use App\Models\Event;
use Carbon\Carbon;

public function index()
{
    $totalVehicles = Vehicle::count();
    $totalDrivers = Driver::count();

    $vehicleTypes = Vehicle::select('vehicle_type')
        ->get()
        ->groupBy('vehicle_type')
        ->map->count();

    // Get all event dates
    $events = Event::pluck('event_date')->map(function ($date) {
        return Carbon::parse($date)->format('Y-m-d');
    });

    return view('dashboard', compact('totalVehicles', 'totalDrivers', 'vehicleTypes', 'events'));
}
