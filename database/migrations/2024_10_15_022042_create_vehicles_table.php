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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vehicle_type')->constrained('vehicle_types')->onDelete('cascade');
            $table->string('plate_number');
            $table->string('model');
            $table->string('capacity');
            $table->foreignId('id_status_vehicle')->constrained('status_vehicles')->onDelete('cascade');
            $table->string('fuel_consumption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
