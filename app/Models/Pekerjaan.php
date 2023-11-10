<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function workOrder()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
