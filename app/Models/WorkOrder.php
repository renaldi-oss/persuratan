<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function surat()
    {
        return $this->hasMany(Surat::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function purchaseRequest()
    {
        return $this->hasMany(PurchaseRequest::class);
    }
    
    public function qualityControl()
    {
        return $this->hasOne(QualityControl::class);
    }

    public static function Last(){
        return static::all()->last();
    }
}
