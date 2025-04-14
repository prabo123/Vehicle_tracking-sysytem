<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    // Show the driver details form
    public function create()
    {
        return view('driver_Details'); // resources/views/driver/create.blade.php
    }

    // Store driver data

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12|unique:drivers',
            'license_number' => 'required|string|max:50',
            'mobile_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'home_number' => 'nullable|string|max:15',
            'passport_number' => 'nullable|string|max:20',
            'medical_category' => 'nullable|string|max:50',
            'driving_categories' => 'nullable|string|max:255', // could be comma-separated list
        ]);

        Driver::create($validated);

        return redirect()->route('driver.view')->with('success', 'Driver saved successfully!');
    }

    // View all drivers
    public function view()
{
    $drivers = Driver::all();
    return view('driver_veiw', compact('drivers'));
}

    

    // Update driver data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12',
            'license_number' => 'required|string|max:50',
            'mobile_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'home_number' => 'nullable|string|max:15',
            'passport_number' => 'nullable|string|max:20',
            'medical_category' => 'nullable|string|max:50',
            'driving_categories' => 'nullable|string|max:255',
        ]);

        $driver = Driver::findOrFail($id);
        $driver->update($validated);

        return redirect()->route('driver.view')->with('success', 'Driver updated successfully!');
    }

    // Show single driver details
    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.show', compact('driver')); // resources/views/driver/show.blade.php
    }
}
