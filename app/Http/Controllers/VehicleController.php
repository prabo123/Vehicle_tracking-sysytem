<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // Show the vehicle details form
    public function index()
    {
        return view('vehical_Details'); // points to resources/views/User/vehical_Details.blade.php
    }

    // Store vehicle data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_type' => 'required|string',
            'other_vehicle_type' => 'nullable|string',
            'vehicle_model' => 'required|string',
            'other_model' => 'nullable|string',
            'year_manufacture' => 'required|integer',
            'year_registration' => 'required|integer',
            'assign_date' => 'required|date',
            'vehicle_number' => 'required|string|unique:vehicles,vehicle_number',
            'fuel_type' => 'required|string',
            'engine_capacity' => 'required|integer',
            'revenue_license_year' => 'required|integer',
            'security_capacity' => 'required|integer',
        ]);

        Vehicle::create($validated);

        return redirect()->route('vehicle_Details')->with('success', 'Vehicle saved successfully!');
    }

    // Update vehicle data
   

    // View all vehicles
    public function view()
    {
        $vehicles = Vehicle::all();
        return view('vehical_veiw', compact('vehicles')); // should match your actual filename
    }

    // Edit vehicle form
    public function update(Request $request, $id)
{
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->update($request->all());

    return redirect()->back()->with('success', 'Vehicle updated successfully!');
}

public function destroy($id)
{
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->delete();

    return response()->json(['success' => true]);
}
    public function show($id)
{
    $vehicle = Vehicle::findOrFail($id);
    return view('vehical2_view', compact('vehicle'));
}

}
