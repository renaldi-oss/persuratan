<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseReq extends Model
{
    protected $table = 'purchase_req';
    protected $fillable = ['id_proyek', 'kode_prc_req'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }

    // Define other relationships as needed
}

