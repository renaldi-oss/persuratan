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
        return $this->belongsTo(Surat::class);
    }

    public function purchaseRequest()
    {
        return $this->hasMany(PurchaseRequest::class);
    }

    public static function Last(){
        return static::all()->last();
    }
}
