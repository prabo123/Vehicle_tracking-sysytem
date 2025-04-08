@extends('layouts.app') <!-- if you use a layout -->

@section('content')
<div class="main-content">
    <div class="widget-box">
        <div class="widget-title bg-light p-3 border-bottom">
            <h5>Edit Vehicle Details</h5>
        </div>

        <div class="widget-content p-4">
            <form action="{{ route('vehical.update', $vehicle->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- required for PUT method -->

                @php
                    $fields = [
                        'vehicle_type' => ['label' => 'Vehicle Type', 'type' => 'select', 'options' => ['Car', 'Lorry', 'Bus', 'Van', 'Threewheel', 'Bike', 'Other']],
                        'vehicle_model' => ['label' => 'Vehicle Model', 'type' => 'text'],
                        'year_manufacture' => ['label' => 'Year of Manufacture', 'type' => 'number'],
                        'year_registration' => ['label' => 'Year of Registration', 'type' => 'number'],
                        'assign_date' => ['label' => 'Assigned to Pool Date', 'type' => 'date'],
                        'vehicle_number' => ['label' => 'Vehicle Number', 'type' => 'text'],
                        'fuel_type' => ['label' => 'Fuel Type', 'type' => 'text'],
                        'engine_capacity' => ['label' => 'Engine Capacity (cc)', 'type' => 'number'],
                        'revenue_license_year' => ['label' => 'Revenue License Year', 'type' => 'number'],
                        'security_capacity' => ['label' => 'Security Capacity', 'type' => 'number'],
                    ];
                @endphp

                @foreach ($fields as $name => $field)
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-end">{{ $field['label'] }}:</label>
                        <div class="col-md-9">
                            @if ($field['type'] === 'select')
                                <select name="{{ $name }}" class="form-control" required>
                                    <option value="">-- Select --</option>
                                    @foreach ($field['options'] as $option)
                                        <option value="{{ $option }}" {{ $vehicle->$name === $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="{{ $field['type'] }}"
                                       name="{{ $name }}"
                                       class="form-control"
                                       value="{{ old($name, $vehicle->$name) }}"
                                       required />
                            @endif
                        </div>
                    </div>
                @endforeach

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success px-4">Update Vehicle</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
