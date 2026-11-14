<?php

use App\Enums\KondisiKendaraan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kendaraan_dinas_operasionals', function (Blueprint $table) {
            $table->id();
            $table->foreign('perangkat_daerah_id')->nullable()->constrained('perangkat_daerahs');
            $table->foreign('pegawai_negeri_sipil_id')->nullable()->constrained('pegawai_negeri_sipils');
            $table->string('nomor_polisi_kendaraan')->unique();
            $table->string('merek_kendaraan')->nullable();
            $table->string('tipe_kendaraan')->nullable();
            $table->integer('tahun_kendaraan')->default(2000);
            $table->string('warna_kendaraan')->nullable();
            $table->string('kondisi_kendaraan')->default(KondisiKendaraan::BAIK->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan_dinas_operasionals');
    }
};
