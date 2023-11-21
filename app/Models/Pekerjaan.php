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
        $surat_id = Static::getCount() + 1;
        $surat_no = sprintf('%03d', $surat_id) . '/PEN/TKI/' . static::getMonth() . '/' . date('Y');
        return static::create($data + ['surat_no' => $surat_no, 'surat_id' => $surat_id]);
    }
    
    public static function Last(){
        return static::all()->last();
    }
}
