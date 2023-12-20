<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';
    use HasFactory;
    

    public static function getPoPekerjaan(){
        return static::whereNotNull('pekerjaan_id')->get();
    }
    public static function getPoNonPekerjaan(){
        return static::whereNull('pekerjaan_id')->get();
    }
}
