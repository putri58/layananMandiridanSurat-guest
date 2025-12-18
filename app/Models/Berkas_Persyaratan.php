<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berkas_Persyaratan extends Model
{
    use HasFactory;

    protected $table = 'berkas';
    protected $primaryKey = 'berkas_id';

    protected $fillable = [
        'permohonan_surat_id',
        'nama_berkas',
        'valid'
    ];

    protected $casts = [
        'valid' => 'boolean'
    ];

    /**
     * Relasi ke Permohonan Surat
     */
    public function permohonanSurat(): BelongsTo
    {
        return $this->belongsTo(
            PermohonanSurat::class,
            'permohonan_surat_id',
            'permohonan_id'
        );
    }

    /**
     * Relasi ke Media (berkas bisa punya banyak file)
     */
    public function media(): HasMany
    {
        return $this->hasMany(
            Media::class,
            'ref_id',
            'berkas_id'
        )->where('ref_table', 'berkas');
    }
}
