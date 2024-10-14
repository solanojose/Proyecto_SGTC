<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            "name"=> "Valledupar",
            'id_departament' => 1, 
        ]);

        City::create([
            "name"=> "Aguachica",
            'id_departament' => 1, 
        ]);

        City::create([
            "name"=> "Agustin Codazzi",
            'id_departament' => 1, 
        ]);

        City::create([
            "name"=> "Hatonuevo",
            'id_departament' => 2, 
        ]);

        City::create([
            "name"=> "Barrancas",
            'id_departament' => 2, 
        ]);

        City::create([
            "name"=> "Fonseca",
            'id_departament' => 2, 
        ]);

        City::create([
            "name"=> "San Juan del Cesar",
            'id_departament' => 2, 
        ]);
    }
}
