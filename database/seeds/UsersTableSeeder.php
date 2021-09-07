<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Felipe',
            'lastname' => 'Moreno Duran',
            'email' => 'fmoreno@scada.cl',
            'enterprise' => 'Scada',
            'position' => 'Ingeniero de Sistemas',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

        App\User::create([
            'name' => 'Supervisor',
            'lastname' => 'Supervisor',
            'email' => 'supervisor@supervisor.com',
            'enterprise' => 'Scada',
            'position' => 'visita',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

        App\User::create([
            'name' => 'Foreman',
            'lastname' => 'Foreman',
            'email' => 'foreman@foreman.com',
            'enterprise' => 'Scada',
            'position' => 'visita',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

        App\User::create([
            'name' => 'Guest',
            'lastname' => 'Guest',
            'email' => 'guest@guest.com',
            'enterprise' => 'Scada',
            'position' => 'visita',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

        App\User::create([
            'name' => 'Isaac',
            'lastname' => 'Fuenzalida',
            'email' => 'iafuenzalida@globalvia.com',
            'enterprise' => 'Scada',
            'position' => 'Supervisor de Terreno Tramo Urbano',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

        App\User::create([
            'name' => 'Jorge',
            'lastname' => 'Cardona',
            'email' => 'jcardona@scada.cl',
            'enterprise' => 'Scada',
            'position' => 'Jefe de Mantenimiento y Obras',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

        App\User::create([
            'name' => 'Agustín',
            'lastname' => 'Solis',
            'email' => 'asolis@scada.cl',
            'enterprise' => 'Scada',
            'position' => 'Jefe de Sistemas y Tecnología',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

        App\User::create([
            'name' => 'Alvaro',
            'lastname' => 'Urbina',
            'email' => 'agurbina@globalvia.com',
            'enterprise' => 'Scada',
            'position' => 'Gerente de Operaciones y Sistemas',
            'is_active' => 1,
            'password' => bcrypt('123456')
        ]);

    }
}
