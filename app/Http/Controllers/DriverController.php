<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the drivers.
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new driver.
     */
    public function create()
    {
        return view('driver_Details');
    }

    /**
     * Store a newly created driver in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:20',
            'other_id' => 'nullable|string|max:50',
            'license_no' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'home_phone' => 'nullable|string|max:15',
            'passport' => 'nullable|string|max:50',
            'medical_category' => 'nullable|string|max:100',
            'driving_categories' => 'nullable|array',
            'driving_categories.*' => 'string|in:High Vehicle,Heavy Vehicle,Three Vehicle',
        ]);

        // Convert driving categories to a string for storage
        $validated['driving_categories'] = isset($validated['driving_categories'])
            ? implode(', ', $validated['driving_categories'])
            : null;

        Driver::create($validated);

        return redirect()->back()->with('success', 'Driver details saved successfully!');
    }

    /**
     * Show the form for editing the specified driver.
     */
    public function edit(Driver $driver)
    {
        return view('driver.edit', compact('driver'));
    }

    /**
     * Update the specified driver in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:20',
            'other_id' => 'nullable|string|max:50',
            'license_no' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'home_phone' => 'nullable|string|max:15',
            'passport' => 'nullable|string|max:50',
            'medical_category' => 'nullable|string|max:100',
            'driving_categories' => 'nullable|array',
            'driving_categories.*' => 'string|in:High Vehicle,Heavy Vehicle,Three Vehicle',
        ]);

        $validated['driving_categories'] = isset($validated['driving_categories'])
            ? implode(', ', $validated['driving_categories'])
            : null;

        $driver->update($validated);

        return redirect()->back()->with('success', 'Driver updated successfully!');
    }

    /**
     * Remove the specified driver from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->back()->with('success', 'Driver deleted successfully!');
    }
}
