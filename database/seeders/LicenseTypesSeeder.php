<?php

namespace Database\Seeders;

use App\Models\LicenseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LicenseType::create([
            "name"=> "B1"
        ]);

        LicenseType::create([
            "name"=> "B2"
        ]);

        LicenseType::create([
            "name"=> "C1"
        ]);
    }
}
