<?php

namespace App\Http\Controllers;

use App\Models\StatusVehicle;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create() 
    {
        $vehicleTypes = VehicleType::all();
        $statusVehicles = StatusVehicle::all();
    
        return view("Admin.registerVehicle", compact("vehicleTypes","statusVehicles"));
    }
    

    public function store(Request $request){

        $request->validate([
            'id_vehicle_type'=>'required',
            'plate_number'=>'required',
            'model'=>'required',
            'capacity'=>'required',
            'id_status_vehicle'=>'required',
            'fuel_consumption'=>'required',
        ]);

        $vehicle = new Vehicle();
        $vehicle->id_vehicle_type = $request->id_vehicle_type;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->model= $request->model;
        $vehicle->capacity = $request->capacity;
        $vehicle->id_status_vehicle = $request->id_status_vehicle;
        $vehicle->fuel_consumption= $request->fuel_consumption;
        $vehicle->save();

        return redirect()->route('vehicles.create')->with('success', 'Vehiculo registrado con éxito');
    }
}
