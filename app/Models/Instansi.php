<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansis';
    
    protected $guarded = ['id'];

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }
}
