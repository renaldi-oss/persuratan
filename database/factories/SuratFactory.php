<?php

namespace Database\Factories;

use App\Models\KodeSurat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           
        ];
    }

    public function penawaran($kode = 'PEN', $idkode = 1): SuratFactory
    {
        static $id = 1;
    
        return $this->state([
            'no_surat' => str_pad($id++, 3, '0', STR_PAD_LEFT) . '/' . $kode . '/TKI/I/VI/2023',
            'kode_surat_id' => KodeSurat::where('kode', $kode)->first()->id,
        ]);
    }

    public function PurchaseOrder($kode = 'PO', $idkode = 2): SuratFactory
    {
        static $id = 1;
    
        return $this->state([
            'no_surat' => str_pad($id++, 3, '0', STR_PAD_LEFT) . '/' . $kode . '/TKI/I/VI/2023',
            'kode_surat_id' => KodeSurat::where('kode', $kode)->first()->id,
        ]);
    }

}
