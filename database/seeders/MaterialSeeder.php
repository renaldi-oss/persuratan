<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Pekerjaan;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Get all Pekerjaan instances
         $pekerjaanIds = Pekerjaan::pluck('id')->toArray();

         // Loop through each Pekerjaan and create 10 Material instances for each
         foreach ($pekerjaanIds as $pekerjaanId) {
             Material::factory()->count(10)->create([
                 'pekerjaan_id' => $pekerjaanId,
             ]);
         }
    }
}
