<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\QcPass;

class QcPassSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            QcPass::create([
                'id_proyek' => $faker->numberBetween(1, 10), // Assuming 10 'proyek' records are created
                'nama' => $faker->name,
                'jumlah' => $faker->randomFloat(2, 1, 1000),
                'tipe' => $faker->word,
                'ket' => $faker->sentence(5),
                'gambar' => null, // You can insert a binary file here if needed
            ]);
        }
    }
}
