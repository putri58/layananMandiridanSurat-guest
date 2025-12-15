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
        Schema::create('media', function (Blueprint $table) {
            // Primary Key custom (sesuai request awal: media_id)
            $table->id('media_id');
            //coba

            // Kolom Penghubung (Polymorphic Manual)
            $table->string('ref_table'); // Contoh isi: 'persil', 'dokumen_hukum'
            $table->unsignedBigInteger('ref_id'); // ID dari tabel terkait (misal: persil_id)

            // Info File
            $table->string('file_name'); // Nama file fisik di storage
            $table->string('caption')->nullable(); // Nama asli/keterangan file
            $table->string('mime_type')->nullable(); // Tipe file (jpg, pdf, png)
            $table->integer('sort_order')->default(0); // Untuk urutan tampilan

            $table->timestamps();

            // INDEXING (Sangat Penting!)
            // Agar pencarian file berdasarkan tabel & ID jadi cepat
            $table->index(['ref_table', 'ref_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
