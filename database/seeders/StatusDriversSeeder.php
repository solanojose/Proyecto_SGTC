<?php

namespace Database\Seeders;

use App\Models\StatusDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusDriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusDriver::create([
            "name"=> "Disponible",
        ]);

        StatusDriver::create([
            "name"=> "Ocupado",
        ]);
    }
}
