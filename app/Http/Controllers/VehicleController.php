<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // Show the vehicle details form
    public function index()
    {
        return view('vehical_Details');
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
            'vehicle_number' => 'required|string|unique:vehicle_Details',
            'fuel_type' => 'required|string',
            'engine_capacity' => 'required|integer',
            'revenue_license_year' => 'required|integer',
            'security_capacity' => 'required|integer',
        ]);

        Vehicle::create($validated);

        return redirect()->route('vehical_Details')->with('success', 'Vehicle saved successfully!');
    }

    // Update vehicle data
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'vehicle_type' => 'required|string',
            'vehicle_model' => 'nullable|string',
            'other_model' => 'nullable|string',
            'year_manufacture' => 'required|integer',
            'year_registration' => 'required|integer',
            'assign_date' => 'required|date',
            'vehicle_number' => 'required|string',
            'fuel_type' => 'required|string',
            'engine_capacity' => 'required|integer',
            'revenue_license_year' => 'required|integer',
            'security_capacity' => 'required|integer',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($validated);

        return redirect()->route('vehicle.view')->with('success', 'Vehicle updated successfully!');
    }

    // View all vehicles
    public function view()
    {
        $vehicles = Vehicle::all();
        return view('vehical_veiw', compact('vehicles'));
    }

    // Edit vehicle form
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('Edit_Vehical', compact('vehicle'));
    }
}
