<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_status_surat', function (Blueprint $table) {
            $table->id('riwayat_id');

            $table->unsignedBigInteger('permohonan_id');
            $table->string('status');
            $table->unsignedBigInteger('petugas_warga_id');
            $table->timestamp('waktu')->useCurrent();
            $table->text('keterangan')->nullable();

            $table->foreign('permohonan_id')
                ->references('permohonan_id')
                ->on('permohonan_surat')
                ->cascadeOnDelete();

            $table->foreign('petugas_warga_id')
                ->references('id')
                ->on('warga')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_status_surat');
    }
};
