<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use App\Models\PurchaseOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Pekerjaan::all()->each(function (Pekerjaan $pekerjaan) use ($faker) {
            PurchaseOrder::factory()->count(1)->create([
                'pekerjaan_id' => $faker->randomElement([null, $pekerjaan->id]),
                'surat_no' => $pekerjaan->surat_no,
            ]);
        });
    }
}
