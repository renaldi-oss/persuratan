<?php

namespace Database\Seeders;

use App\Models\WorkOrder;
use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkOrder::all()->each(function ($wo) {
            Jadwal::factory()->count(2)->create([
                'work_order_id' => $wo->id,
            ]);
        });
    }
}
