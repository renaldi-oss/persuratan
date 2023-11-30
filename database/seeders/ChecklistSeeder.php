<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\WorkOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkOrder::all()->each(function (WorkOrder $workOrder) {
            Checklist::factory()
            ->count(1)
            ->create([
                'work_order_id' => $workOrder->id,
            ]);
        });
    }
}
