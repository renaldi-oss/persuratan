<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\Pekerjaan;
use App\Models\WorkOrder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkOrder::all()->each(function (WorkOrder $workOrder) {
            Surat::factory()->count(1)
            ->create([
                'work_order_id' => $workOrder->id,
                'kode_surat_id' => 1,
            ])->each(function (Surat $surat) {
                $surat->addMedia(public_path('assets/img/bruh.jpg'))
                      ->preservingOriginal()
                      ->toMediaCollection('surat');
            });
        });
    }
}
