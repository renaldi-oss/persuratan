<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use App\Models\Surat;
use App\Models\WorkOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pekerjaan::Last()->each(function (Pekerjaan $pekerjaan) {   
            WorkOrder::factory()
            ->count(1)
            ->create([
                'pekerjaan_id' => $pekerjaan->id,
                'surat_id' => function () {
                    return Surat::factory()->purchaseOrder()->create()->id;
                },
                'nama' => $pekerjaan->nama,
                'deskripsi' => $pekerjaan->deskripsi,
                'lokasi' => $pekerjaan->lokasi,
                'due_date' => $pekerjaan->due_date,
            ]);
        });
    }
}
