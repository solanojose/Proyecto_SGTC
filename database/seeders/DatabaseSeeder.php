<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([

            DocumentTypesSeeder::class,
            LicenseTypesSeeder::class,
            StatusDriversSeeder::class,
            RolesSeeder::class,
            UserSeeder::class,
            DepartamentsSeeder::class,
            CitiesSeeder::class,
            VehicleTypesSeeder::class,
            StatusVehiclesSeeder::class,
        ]);
    }
}
