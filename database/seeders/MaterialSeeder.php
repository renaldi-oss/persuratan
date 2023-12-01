<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Pekerjaan;
use Faker\Factory as Faker;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Faker::create();

         Pekerjaan::all()->each(function (Pekerjaan $pekerjaan) use ($faker) {
             Material::factory()->count(1)->create([
                 'pekerjaan_id' => $faker->randomElement([null, $pekerjaan->id]),
             ]);
         });
            
    }
}
