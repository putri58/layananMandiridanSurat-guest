<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Berkas_Persyaratan extends Model
{
    use HasFactory;

    protected $table = 'berkas';
    protected $primaryKey = 'berkas_id';

    protected $fillable = [
        'permohonan_id',
        'nama_berkas',
        'valid'
    ];

    protected $casts = [
        'valid' => 'boolean'
    ];

    // Model Berkas_Persyaratan
public function permohonanSurat()
{
    return $this->belongsTo(
        PermohonanSurat::class,
        'permohonan_id',  // FK di tabel berkas
        'permohonan_id'   // PK di tabel permohonan_surat
    );
}

    /**
     * Relasi ke Media - HAS MANY
     * Karena bisa ada beberapa media untuk satu berkas
     */
    public function media()
{
    return $this->hasMany(Media::class, 'ref_id', 'berkas_id')
                ->where('ref_table', 'berkas');
}


    /**
     * Relasi ke Media - HAS ONE (untuk mengambil file utama)
     */
    public function file(): HasOne
    {
        return $this->hasOne(
            Media::class,
            'ref_id',
            'berkas_id'
        )->where('ref_table', 'berkas_persyaratan')
         ->orderBy('sort_order', 'asc')
         ->orderBy('media_id', 'asc');
    }
    

    /**
     * Accessor untuk mendapatkan path file
     */
    public function getFilePathAttribute()
    {
        $media = $this->file;
        if ($media && $media->file_name) {
            return 'berkas_persyaratan/' . $media->file_name;
        }
        return null;
    }

    /**
     * Accessor untuk status berkas (lebih user-friendly)
     */
    public function getStatusAttribute()
    {
        if ($this->valid === true) {
            return 'Valid';
        } elseif ($this->valid === false) {
            return 'Tidak Valid';
        }
        return 'Belum Divalidasi';
    }

    /**
     * Scope untuk berkas yang valid
     */
    public function scopeValid($query)
    {
        return $query->where('valid', true);
    }

    /**
     * Scope untuk berkas yang tidak valid
     */
    public function scopeInvalid($query)
    {
        return $query->where('valid', false);
    }

    /**
     * Scope untuk berkas berdasarkan permohonan
     */
    public function scopeByPermohonan($query, $permohonanId)
    {
        return $query->where('permohonan_surat_id', $permohonanId);
    }
}