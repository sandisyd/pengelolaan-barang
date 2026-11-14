<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerangkatDaerah extends Model
{
    //

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_perangkat_daerah',
    ];

    public function pns(): HasMany
    {
        return $this->hasMany(PegawaiNegeriSipil::class, 'perangkat_daerah_id');
    }


    public function kendaraanDinas(): HasMany
    {
        return $this->hasMany(KendaraanDinasOperasional::class, 'perangkat_daerah_id');
    }
}
