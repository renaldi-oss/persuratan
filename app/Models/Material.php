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

    public static function getAllMaterialPekerjaan()
    {
        return static::whereNotNull('pekerjaan_id')->get();
    }
    public static function getAllMaterialNonPekerjaan()
    {
        return static::whereNull('pekerjaan_id')->get();
    }
}
