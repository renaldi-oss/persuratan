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
        static $id = 1;
    
        Pekerjaan::factory()
        ->count(10)
        ->create([
            'instansi_id' => function () {
                return Instansi::factory()->create()->id;
            },
            'id_surat' => function () use (&$id) {
                return sprintf('%03d', $id);
            },
            'no_surat' => function () use (&$id) {
                return sprintf('%03d', $id++) . '/PEN/TKI/' . (new \Romans\Filter\IntToRoman())->filter(date('m')) . '/' . date('Y');
            },
        ])->each(function (Pekerjaan $pekerjaan) {
            $pekerjaan->addMedia(public_path('assets/img/bruh.jpg'))
                      ->preservingOriginal()
                      ->toMediaCollection('pekerjaan');
        });
    }
}