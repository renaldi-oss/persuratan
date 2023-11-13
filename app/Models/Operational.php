<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Operational extends Model
{
    use HasFactory;

    protected $table = 'operationals';
    protected $guarded = ['id'];

    public function pekerjaan() : BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }

    public function instansi(): HasOneThrough
    {
        return $this->hasOneThrough(Instansi::class, Pekerjaan::class);
    }
}
