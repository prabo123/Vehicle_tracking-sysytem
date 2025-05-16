<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    // Show the driver form
    public function index()
    {
        return view('driver_Details'); // View: resources/views/driver_Details.blade.php
    }

    // Store driver data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12|unique:drivers',
            'license_no' => 'required|string|max:50',
            'mobile' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'home_phone' => 'nullable|string|max:15',
            'passport' => 'nullable|string|max:20',
            'medical_category' => 'required|string|max:50',
            'driving_categories' => 'nullable|array',
        ]);

        // Convert driving categories array to comma-separated string
        $validated['driving_categories'] = isset($validated['driving_categories']) 
            ? implode(', ', $validated['driving_categories']) 
            : null;

        Driver::create($validated);

        return redirect()->route('driver.view')->with('success', 'Driver saved successfully!');
    }

    // View all drivers
    public function view()
    {
        $drivers = Driver::all();
        return view('admin.driver_view', compact('drivers')); // View: resources/views/admin/driver_view.blade.php
    }

    // Show driver edit form
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.edit', compact('driver')); // View: resources/views/driver/edit.blade.php
    }

    // Update driver data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12',
            'license_no' => 'required|string|max:50',
            'mobile' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'home_phone' => 'nullable|string|max:15',
            'passport' => 'nullable|string|max:20',
            'medical_category' => 'required|string|max:50',
            'driving_categories' => 'nullable|array',
        ]);

        // Convert driving categories array to comma-separated string
        $validated['driving_categories'] = isset($validated['driving_categories']) 
            ? implode(', ', $validated['driving_categories']) 
            : null;

        $driver = Driver::findOrFail($id);
        $driver->update($validated);

        return redirect()->route('driver.view')->with('success', 'Driver updated successfully!');
    }

    // Show single driver details
    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.show', compact('driver')); // View: resources/views/driver/show.blade.php
    }
}
