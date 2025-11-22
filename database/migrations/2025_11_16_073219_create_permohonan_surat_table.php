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
         Schema::create('permohonan_surat', function (Blueprint $table) {
    $table->increments('permohonan_id');

    $table->string('nomor_permohonan')->unique();

    // FK ke tabel warga
    $table->unsignedInteger('pemohon_warga_id');

    // FK ke tabel jenis_surat
    $table->unsignedInteger('jenis_id');

    $table->date('tanggal_pengajuan');
    $table->string('status')->default('Menunggu');
    $table->text('catatan')->nullable();

    $table->timestamps();

    // RELASI KE WARGA
    $table->foreign('pemohon_warga_id')
          ->references('warga_id')
          ->on('warga')
          ->onDelete('cascade');

    // RELASI KE JENIS_SURAT
    $table->foreign('jenis_id')
          ->references('jenis_id')
          ->on('jenis_surat')
          ->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_surat');
    }
};
