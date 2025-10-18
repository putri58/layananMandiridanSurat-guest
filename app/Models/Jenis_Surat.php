<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_Surat extends Model
{
    protected $table        = 'jenis_surat';
    protected $primaryKey   = 'jenis_surat_id';
    protected $fillable     =[
        'kode',
        'nama_jenis',
        'syarat_json',
    ];
}
