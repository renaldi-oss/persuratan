<?php

namespace Database\Seeders;

use App\Models\Operational;
use App\Models\Pekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class OperationalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operational::factory()->count(5)->create([
            'pekerjaan_id' => Pekerjaan::inRandomOrder()->first()->id,
        ]);
    }
}
