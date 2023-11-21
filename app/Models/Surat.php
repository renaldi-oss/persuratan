<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Romans\Filter\IntToRoman;

class Surat extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];

    public function pekerjaan()
    {
        return $this->HasOne(Pekerjaan::class);
    }

    public function workOrder()
    {
        return $this->HasOne(WorkOrder::class);
    }

    public function kodeSurat()
    {
        return $this->belongsTo(KodeSurat::class);
    }

    private static function getCount($kode) {
        return static::withTrashed()->whereHas('kodeSurat', fn($query) => $query->where('kode', $kode))->count();
    }
    
    private static function getMonth() {
        return (new IntToRoman())->filter(date('m'));
    }

    public static function createPenawaran(array $data){
        $surat_no = sprintf('%03d', static::getCount('PEN') + 1) . '/PEN/TKI/' . static::getMonth() . '/' . date('Y');
        return static::create($data + ['surat_no' => $surat_no]);
    }
    
    public static function createPurchaseOrder(string $suratPenawaran){
        $surat_no = explode('/', $suratPenawaran)[0] . '/PO/TKI/' . static::getMonth() . '/' . date('Y');
        return static::updateOrCreate(['surat_no' => $surat_no , 'kode_surat_id' => 2]);
    }

    public static function Last(){
        return static::all()->last();
    }
}
