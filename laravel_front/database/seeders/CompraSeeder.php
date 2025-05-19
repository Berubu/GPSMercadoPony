<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompraSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('compras')->insert([
                'fechaCompra' => $faker->dateTimeThisYear,
                'total' => $faker->randomFloat(2, 50, 1000), // Total aleatorio entre 50 y 1000
                'idUsuario' => $faker->numberBetween(3, 11), // ID de usuario aleatorio entre 1 y 10
                'idProducto' => $faker->numberBetween(7, 12), // ID de producto aleatorio entre 1 y 10
            ]);
        }
    }
}
