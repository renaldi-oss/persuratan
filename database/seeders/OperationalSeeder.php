<?php

namespace Database\Seeders;

use App\Models\Operational;
use App\Models\Proyek;
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
            'proyek_id' => Proyek::inRandomOrder()->first()->id,
        ]);
    }
}
