<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Persuratan;

class PersuratanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Persuratan::create([
                'id_proyek' => $faker->numberBetween(1, 10), // Assuming 10 'proyek' records are created
                'id_kode' => $faker->numberBetween(1, 10), // Assuming 10 'kode_surat' records are created
                'tipe_surat' => $faker->word,
                'scan' => null, // You can insert a binary file here if needed
            ]);
        }
    }
}
