<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'admin@teste.com',
                'password' => Hash::make('admin123'),
                'type_user' => 'Administrador',
                'work_location' => 'UBS1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Farmaceutico',
                'email' => 'farmaceutico@teste.com',
                'password' => Hash::make('farmaceutico123'),
                'type_user' => 'Farmaceutico',
                'work_location' => 'UPA1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medico',
                'email' => 'medico@teste.com',
                'password' => Hash::make('medico123'),
                'type_user' => 'medico',
                'work_location' => 'UBS2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 