<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrador'
        ]);

        Role::create([
            'name' => 'Cliente'
        ]);

        Role::create([
            'name' => 'Conductor'
        ]);
    }
}
