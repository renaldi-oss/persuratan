<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kodeSurat extends Model
{
    use HasFactory;

    protected $table = 'kode_surat';
    protected $fillable = ['kode', 'keterangan'];

    // Define relationships as needed
}
