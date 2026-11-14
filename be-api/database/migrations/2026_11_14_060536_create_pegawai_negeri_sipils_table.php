<?php

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
        Schema::create('pegawai_negeri_sipils', function (Blueprint $table) {
            $table->id();
            $table->foreign('perangkat_daerah_id')->nullable()->constrained('perangkat_daerahs');
            $table->string('nama_pegawai');
            $table->string('nip')->unique();
            $table->string('jabatan')->nullable();
            $table->string('golongan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_negeri_sipils');
    }
};
