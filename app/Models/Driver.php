<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nic',
        'other_id',
        'license_no',
        'address',
        'mobile',
        'home_phone',
        'passport',
        'medical_category',
        'driving_categories',
    ];
}
