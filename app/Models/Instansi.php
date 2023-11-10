<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansis';
    protected $guarded = ['id'];

    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'instansi_id');
    }
}
