<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KendaraanDinasOperasional extends Model
{
    //
    protected $fillable = [
        'perangkat_daerah_id',
        'pegawai_negeri_sipil_id',
        'nomor_polisi_kendaraan',
        'merek_kendaraan',
        'tipe_kendaraan',
        'tahun_kendaraan',
        'warna_kendaraan',
        'kondisi_kendaraan',
    ];

    public function perangkatDaerah(): BelongsTo
    {
        return $this->belongsTo(PerangkatDaerah::class, 'perangkat_daerah_id');

    }

    public function pemegang(): BelongsTo
    {
        return $this->belongsTo(PegawaiNegeriSipil::class, 'pegawai_negeri_sipil_id');
    }
}
