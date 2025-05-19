<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('productos')->insert([
                'nombreProducto' => $faker->words(3, true),
                'descripcion' => $faker->sentence,
                'precio' => $faker->randomFloat(2, 5, 500), // Precio aleatorio entre 5 y 500
                'fechaPublicacion' => $faker->dateTimeThisYear,
                'idUsuario' => $faker->numberBetween(1, 10), // ID de usuario entre 1 y 10
            ]);
        }
    }
}
