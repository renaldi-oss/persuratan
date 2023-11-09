<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Pekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pekerjaan::factory()->count(10)->create([
            'instansi_id' => Instansi::inRandomOrder()->first()->id,
        ]);
    }
}
