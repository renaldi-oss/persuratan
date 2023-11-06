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

    public function proyek() : BelongsTo
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function instansi(): HasOneThrough
    {
        return $this->hasOneThrough(Instansi::class, Proyek::class);
    }
}
