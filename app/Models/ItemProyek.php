<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProyek extends Model
{
    protected $table = 'work_order';
    protected $fillable = ['id_proyek', 'kode_wo'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }
    // Define other relationships as needed
}
