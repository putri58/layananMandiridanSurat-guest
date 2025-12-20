<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // CEK DULU APAKAH TABEL SUDAH ADA
        if (!Schema::hasTable('riwayat_status_surat')) {
            Schema::create('riwayat_status_surat', function (Blueprint $table) {
                $table->id('riwayat_id');
                $table->unsignedBigInteger('permohonan_id');
                $table->string('status');
                $table->unsignedBigInteger('petugas_warga_id');
                $table->timestamp('waktu')->useCurrent();
                $table->text('keterangan')->nullable();
                $table->timestamps(); // JANGAN LUPA TIMESTAMPS!
                
                // **HAPUS FOREIGN KEY DARI SINI**, BUAT TERPISAH
                // $table->foreign('permohonan_id')...
            });
            
            // **BUAT FOREIGN KEY TERPISAH SETELAH TABLE DIBUAT**
            // Tunggu sebentar untuk pastikan tabel referensi sudah ada
            sleep(1);
            
            // Tambah foreign key untuk permohonan_surat
            if (Schema::hasTable('permohonan_surat')) {
                Schema::table('riwayat_status_surat', function (Blueprint $table) {
                    // Cek apakah kolom permohonan_id ada di permohonan_surat
                    if (Schema::hasColumn('permohonan_surat', 'permohonan_id')) {
                        $table->foreign('permohonan_id')
                            ->references('permohonan_id')
                            ->on('permohonan_surat')
                            ->onDelete('cascade');
                    }
                });
            }
            
            // Tambah foreign key untuk warga
            if (Schema::hasTable('warga')) {
                Schema::table('riwayat_status_surat', function (Blueprint $table) {
                    // Cek apakah kolom id ada di warga
                    if (Schema::hasColumn('warga', 'id')) {
                        $table->foreign('petugas_warga_id')
                            ->references('id')
                            ->on('warga')
                            ->onDelete('cascade');
                    }
                });
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_status_surat');
    }
};