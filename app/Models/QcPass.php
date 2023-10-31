<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QcPass extends Model
{
    use HasFactory;

    protected $table = 'qc_pass';
    protected $fillable = ['id_proyek', 'nama', 'jumlah', 'tipe', 'ket', 'gambar'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }

    // Define other relationships as needed
}
