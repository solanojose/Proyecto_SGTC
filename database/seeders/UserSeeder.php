<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Cristiano',
            'lastname' => 'Ronaldo',
            'email' => 'cr7@gmail.com',
            'password' => Hash::make('goat7777'), 
        ]);


        $user->roles()->attach(1);
    }
}
