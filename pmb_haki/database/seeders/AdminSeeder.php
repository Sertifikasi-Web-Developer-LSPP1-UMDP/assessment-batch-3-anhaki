<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Seeder for users
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin123'),
            'roles' => 'admin',
            'status' => 'verified',
            'mhs_status' => 'unregistered', 
        ]);

        User::create([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin123'),
            'roles' => 'admin',
            'status' => 'verified',
            'mhs_status' => 'unregistered',
        ]);
    }
}
