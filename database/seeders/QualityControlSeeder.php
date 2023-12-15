<?php

namespace Database\Seeders;

use App\Models\QualityControl;
use App\Models\WorkOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualityControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkOrder::all()->each(function (WorkOrder $workOrder) {
            QualityControl::factory()
            ->count(2)
            ->create([
                'work_order_id' => $workOrder->id,
            ])->each(function (QualityControl $qualityControl) {
                $qualityControl->addMedia(public_path('assets/img/bruh.jpg'))
                      ->preservingOriginal()
                      ->toMediaCollection('quality_control');
            });
        });
    }
}
