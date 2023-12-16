<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Pekerjaan;
use App\Models\WorkOrder;
use Faker\Factory as Faker;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        $faker = Faker::create();

        WorkOrder::all()->each(function (WorkOrder $workOrder) use ($faker) {
            Material::factory()->count(2)->create([
                'work_order_id' => $workOrder->id,
            ]);
        });
    }
}
