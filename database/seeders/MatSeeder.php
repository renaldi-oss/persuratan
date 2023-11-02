<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Mat;

class MatSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Mat::create([
                'id_wo' => $faker->numberBetween(1, 10), // Assuming 10 'work_order' records are created
                'nama' => $faker->word,
                'tipe' => $faker->word,
                'jumlah' => $faker->randomFloat(2, 1, 1000),
            ]);
        }
    }
}
