<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type');
            $table->string('vehicle_model');
            $table->integer('year_manufacture');
            $table->integer('year_registration');
            $table->date('assign_date');
            $table->string('vehicle_number')->unique();
            $table->string('fuel_type');
            $table->integer('engine_capacity');
            $table->integer('revenue_license_year');
            $table->integer('security_capacity');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
}
