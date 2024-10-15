<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_vehicle_type',
        'plate_number',
        'model',
        'capacity',
        'id_status_vehicle',
        'fuel_consumption',
    ];

    public function vehicleType(){

        return $this->belongsTo(VehicleType::class);
    }

    public function statusVehicle(){

        return $this->belongsTo(StatusVehicle::class);

    }
}
