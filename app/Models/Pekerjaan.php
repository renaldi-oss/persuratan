<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Romans\Filter\IntToRoman;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pekerjaan extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = ['id'];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function workOrder()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }

    private static function getCount() {
        return static::withTrashed()->count();
    }
    
    private static function getMonth() {
        return (new IntToRoman())->filter(date('m'));
    }
    public static function createPenawaran(array $data){
        $id_surat = Static::getCount() + 1;
        $no_surat = sprintf('%03d', $id_surat) . '/PEN/TKI/' . static::getMonth() . '/' . date('Y');
        return static::create($data + ['no_surat' => $no_surat, 'id_surat' => $id_surat]);
    }
    
    public static function Last(){
        return static::all()->last();
    }
}
