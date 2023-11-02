<?php

namespace Database\Seeders;

use App\Models\KodeSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KodeSurat;

class KodeSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kode = [
            "PEN" => "PENAWARAN",
            "DO" => "DELIVERY ORDER",
            "BAC" => "BERITA ACARA UJI COBA",
            "BAP" => "BERITA ACARA PELATIHAN",
            "BAST" => "BERITA ACARA SERAH TERIMA",
            "BAPM" => "BERITA ACARA PEMELIHARAAN",
            "BAPP" => "BERITA ACARA PROGRES PEKERJAAN",
            "DOK" => "DOKUMENTASI",
            "PMB" => "PERMOHONAN PEMBAYARAN",
            "INV" => "INVOICE",
            "PINV" => "PERFORMA INVOICE",
            "KWT" => "KWITANSI",
            "SR" => "SERVICE REPORT",
            "PO" => "PURCHASE ORDER",
            "ST" => "SURAT TUGAS",
            "GAR" => "SURAT GARANSI",
            "STP" => "SURAT TUGAS PENGERJAAN",
            "PML" => "PEMELIHARAAN PERALATAN",
            "SBM" => "SURAT BALAS MAGANG",
            "SSM" => "SURAT SELESAI MAGANG",
            "SK" => "SURAT KUASA",
            "SPKS" => "SURAT PERJANJIAN KERJA SAMA",
            "SPR" => "SURAT PERNYATAAN",
            "SKet" => "SURAT KETERANGAN",
            "SKep" => "SURAT KEPUTUSAN",
            "SP" => "SURAT PERINGATAN",
            "Und" => "SURAT UNDANGAN",
            "SPer" => "SURAT PERINTAH",
            "L" => "SURAT LAIN - LAIN"
        ];
        foreach ($kode as $key => $value) {
            KodeSurat::create([
                'kode' => $key,
                'keterangan' => $value
            ]);
        }
    }
}
