<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\WorkOrder;
use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkOrder::with('materials')->get()->each(function (WorkOrder $workOrder) {
            $materials = $workOrder->materials;

            $materials->each(function (Material $material) use ($workOrder) {
                Checklist::factory()
                    ->count(1)
                    ->create([
                        'work_order_id' => $workOrder->id,
                        'material_id' => $material->id,
                    ]);
            });
        });
    }
}
