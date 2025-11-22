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
        return $this->belongsTo(Jenis_Surat::class, 'jenis_id', 'jenis_id');
    }
     public function scopeFilter($query, $request, $filterable)
{
    foreach ($filterable as $column) {
        if ($request->filled($column)) {
            $query->where($column, $request->$column);
        }
    }
    return $query;
}

public function scopeSearch($query, $request, $searchable)
{
    if ($request->filled('search')) {
        $keyword = $request->search;

        $query->where(function($q) use ($searchable, $keyword) {
            foreach ($searchable as $column) {
                $q->orWhere($column, 'LIKE', "%$keyword%");
            }
        });
    }

    return $query;
}

}
