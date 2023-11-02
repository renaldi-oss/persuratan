<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
