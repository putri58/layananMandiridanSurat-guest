<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatStatusSurat extends Model
{
    protected $table = 'riwayat_status_surat';
    protected $primaryKey = 'riwayat_id';
    public $timestamps = false;

    protected $fillable = [
        'permohonan_id',
        'status',
        'petugas_warga_id',
        'keterangan',
        'waktu',
    ];

    public function permohonan()
{
    return $this->belongsTo(
        PermohonanSurat::class,
        'permohonan_id',
        'permohonan_id'
    );
}

public function petugas()
{
    return $this->belongsTo(
        Warga::class,
        'petugas_warga_id',
        'warga_id'
    );
}
}


