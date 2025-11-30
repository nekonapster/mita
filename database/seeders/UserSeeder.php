<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Por si lo ejecutás varias veces
        User::truncate();

        $password = Hash::make('password'); // misma clave para todos (dev)

        $users = [
            [
                'name'  => 'Admin MiTa',
                'email' => 'admin@mita.test',
                'role'  => 'admin',
            ],
            [
                'name'  => 'RRHH MiTa',
                'email' => 'rrhh@mita.test',
                'role'  => 'rrhh',
            ],
            [
                'name'  => 'Director MiTa',
                'email' => 'director@mita.test',
                'role'  => 'director',
            ],
            [
                'name'  => 'Coordinador MiTa',
                'email' => 'coordinador@mita.test',
                'role'  => 'coordinador',
            ],
            [
                'name'  => 'Gerente MiTa',
                'email' => 'gerente@mita.test',
                'role'  => 'gerente',
            ],
            [
                'name'  => 'Jefe Equipo MiTa',
                'email' => 'jefe@mita.test',
                'role'  => 'jefe_equipo',
            ],
        ];

        foreach ($users as $data) {
            User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'role'     => $data['role'],
                'password' => $password,
            ]);
        }
    }
}
