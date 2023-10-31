<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persuratan extends Model
{
    use HasFactory;

    protected $table = 'persuratan';
    protected $fillable = ['id_proyek', 'id_kode', 'tipe_surat', 'scan'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }

    public function kodeSurat()
    {
        return $this->belongsTo(KodeSurat::class, 'id_kode');
    }

    // Define other relationships as needed
}
