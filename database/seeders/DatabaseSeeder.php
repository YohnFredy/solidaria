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


        \App\Models\User::factory()->create([
            'name' => 'fredy',
            'apellido' => 'guapacha',
            'cedula' => 94154629,
            'email' => 'fredy.guapacha@gmail.com',
            'usuario' => 'master',
            'country_id' => 1,
            'state_id' => 1,
            'city' => 'Tuluá',
            'direccion' => 'calle busquela',
            'telefono' => 3145207814
        ]);

        \App\Models\Country::factory(1)->create();
        \App\Models\State::factory(1)->create();
    }
}
