<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_Surat extends Model
{
    protected $table        = 'jenis_surat';
    protected $primaryKey   = 'jenis_surat_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable     =[
        'kode',
        'nama_jenis',
        'syarat_json',
    ];
    public function permohonan(){
        return $this->hasMany(permohonanSurat::class, 'jenis_surat_id');
    }
    public function scopeFilter($query, $request, $filterablecolumns, $searchablecolumns)
{
    foreach ($filterablecolumns as $column) {
        if ($request->has($column) && $request->$column != '') {
            $query->where($column, $request->$column);
        }
    }
    return $query;
}

public function scopeSearch($query, $request, $searchablecolumns)
{
    if ($request->has('search') && $request->search != '') {

        $query->where(function ($q) use ($request, $searchablecolumns) {
            foreach ($searchablecolumns as $column) {
                $q->orWhere($column, 'LIKE', "%{$request->search}%");
            }
        });
    }

    return $query;
}

}
