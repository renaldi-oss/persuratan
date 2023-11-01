<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSurat extends Model
{
    use HasFactory;

    protected $table = 'kode_surats';
    protected $fillable = ['kode', 'keterangan'];

    // Define relationships as needed
}
