<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mat extends Model
{
    use HasFactory;

    protected $table = 'mat';
    protected $fillable = ['id_wo', 'nama', 'tipe', 'jumlah'];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class, 'id_wo');
    }

    // Define other relationships as needed
}
