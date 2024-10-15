<?php

namespace Database\Seeders;

use App\Models\StatusVehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusVehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusVehicle::create([
            "name"=> "Nuevo",
        ]);
    }
}
