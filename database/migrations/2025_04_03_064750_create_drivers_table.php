<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // Full Name
            $table->string('nic');
            $table->string('other_id')->nullable();
            $table->string('license_no');
            $table->string('address');
            $table->string('mobile');
            $table->string('home_phone')->nullable();
            $table->string('passport')->nullable();
            $table->string('medical_category')->nullable();
            $table->text('driving_categories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};

