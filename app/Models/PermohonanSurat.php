<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
     protected $table = 'permohonan_surat';
    protected $fillable = [
        'nomor_permohonan',
        'pemohon_warga_id',
        'jenis_id',
        'tanggal_pengajuan',
        'status',
        'catatan'
    ];
      public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_id');
    }
}
