<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\PurchaseReq;

class PurchaseReqSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            PurchaseReq::create([
                'id_proyek' => $faker->numberBetween(1, 10), // Assuming 10 'proyek' records are created
                'kode_prc_req' => $faker->unique()->ean8,
            ]);
        }
    }
}
