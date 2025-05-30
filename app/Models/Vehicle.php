<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // No need to specify $table if the table is named 'vehicles'

    protected $fillable = [
        'vehicle_type',
        'other_vehicle_type',
        'vehicle_model',
        'other_model',
        'year_manufacture',
        'year_registration',
        'assign_date',
        'vehicle_number',
        'fuel_type',
        'engine_capacity',
        'revenue_license_year',
        'security_capacity',
    ];
}


