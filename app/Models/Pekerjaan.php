<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pekerjaan extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($pekerjaan) {
            $pekerjaan->surat->delete();
        });
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function workOrder()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }

    public static function Last(){
        return static::all()->last();
    }
}
