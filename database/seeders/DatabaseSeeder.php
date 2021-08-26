<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /*$admin = new \App\Models\Administrador();
        $admin->usuario = 'admin';
        $admin->nombre = 'Administrador';
        $admin->telefono = '9191234567';
        $admin->email = 'admin@gmail.com';
        $admin->pass = Hash::make('admin');
        $admin->save(); */

        $cliente = new \App\Models\Cliente();
        $cliente->usuario = 'usuario';
        $cliente->nombre = 'Usuario';
        $cliente->telefono = '9197654321';
        $cliente->email = 'usuario@gmail.com';
        $cliente->pass = Hash::make('usuario');
        $cliente->save();
    }
}
