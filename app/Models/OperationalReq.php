<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalReq extends Model
{
    use HasFactory;

    protected $table = 'operational_req';
    protected $fillable = ['id_proyek', 'tanggal', 'kegiatan', 'id_instansi', 'lokasi', 'jumlah'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    // Define other relationships as needed
}
