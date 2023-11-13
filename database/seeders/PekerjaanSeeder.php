<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Pekerjaan;
use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pekerjaan::factory()
        ->count(10)
        ->create([
            'instansi_id' => function () {
                return Instansi::count() > 0 ? Instansi::all()->random()->id : Instansi::factory()->create()->id;
            },
        ]);
    }
}
