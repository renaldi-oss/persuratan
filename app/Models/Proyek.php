<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $fillable = ['nama_proyek', 'id_instansi', 'pekerjaan', 'lokasi', 'due_date', 'no_po', 'file_po'];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class, 'id_proyek');
    }

    // Define other relationships as needed
}
