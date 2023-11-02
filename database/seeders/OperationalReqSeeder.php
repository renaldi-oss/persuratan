<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\OperationalReq;

class OperationalReqSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            OperationalReq::create([
                'id_proyek' => $faker->numberBetween(1, 10), // Assuming 10 'proyek' records are created
                'tanggal' => $faker->date,
                'kegiatan' => $faker->sentence(5),
                'id_instansi' => $faker->numberBetween(1, 10), // Assuming 10 'instansi' records are created
                'lokasi' => $faker->city,
                'jumlah' => $faker->randomFloat(2, 1, 1000),
            ]);
        }
    }
}
