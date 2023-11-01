<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkOrder;
use Faker\Factory as Faker;

class WorkOrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            WorkOrder::create([
                'id_proyek' => $faker->numberBetween(1, 10), // Assuming 10 'proyek' records are created
                'kode_wo' => $faker->unique()->ean13,
            ]);
        }
    }
}