<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instansi;
use Faker\Factory as Faker;

class InstansiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Instansi::create([
                'nama' => $faker->company,
                'alamat' => $faker->address,
                'kontak' => $faker->name,
                'email' => $faker->safeEmail,
                'lokasi' => $faker->city,
            ]);
        }
    }
}
