<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';
    protected $guarded = ['id'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public static function createMaterial($datas, $pekerjaan_id) {
        foreach ($datas as $key => $data) {
            $input = [
                'pekerjaan_id' => $pekerjaan_id,
                'nama' => $data->nama,
                'brand' => $data->brand,
                'qty' => $data->qty,
                'estimated_price' => $data->estimated_price,
                'tipe' => $data->tipe,
                'toko' => $data->toko,
            ];

            return static::create($input);
        }
        // return static::create($data + ['pekerjaan_id' => $pekerjaan_id]);
    }
}
