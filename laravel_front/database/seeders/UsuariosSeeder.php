<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Usuario::create([
                'NombreUsuario' => $faker->unique()->userName,
                'password' => Hash::make('password123'), // Contraseña fija para prueba
                'email' => $faker->unique()->safeEmail,
                'nombreCompleto' => $faker->name,
                'estrellas' => $faker->numberBetween(0, 5),
                'fechaRegistro' => $faker->dateTimeThisYear,
            ]);
        }
    }
}
