<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id('berkas_id'); // Primary Key dengan nama berkas_id
            $table->unsignedBigInteger('permohonan_id'); // Foreign Key
            $table->string('nama_berkas');
            $table->boolean('valid')->default(false);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('permohonan_id')
                  ->references('id')
                  ->on('permohonan_surat')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('berkas');
    }
};