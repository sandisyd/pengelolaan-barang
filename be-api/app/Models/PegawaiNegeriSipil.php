<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PegawaiNegeriSipil extends Model
{
    //

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'perangkat_daerah_id',
        'nama_pegawai',
        'nip',
        'jabatan',
        'golongan',
    ];


    public function perangkatDaerah(): BelongsTo
    {
        return $this->belongsTo(PerangkatDaerah::class, 'perangkat_daerah_id');
    }

    public function kendaraanDinas(): BelongsTo
    {
        return $this->belongsTo(KendaraanDinasOperasional::class, 'pegawai_negeri_sipil_id');
    }
}
