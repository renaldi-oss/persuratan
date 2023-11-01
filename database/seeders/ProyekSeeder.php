<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Proyek;

class ProyekSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Proyek::create([
                'nama_proyek' => $faker->sentence(3),
                'id_instansi' => $faker->numberBetween(1, 10), // Assuming 10 'instansi' records are created
                'pekerjaan' => $faker->jobTitle,
                'lokasi' => $faker->city,
                'due_date' => $faker->date,
                'no_po' => $faker->ean8,
                'file_po' => null, // You can insert a binary file here if needed
            ]);
        }
    }
}