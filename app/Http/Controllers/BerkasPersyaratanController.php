<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerkasPersyaratanController extends Controller
{
    public function index()
    {
        // Data dummy untuk ditampilkan tanpa database
        $berkas = [
            (object)[
                'id' => 1,
                'nama_berkas' => 'KTP',
                'deskripsi' => 'Salinan KTP yang masih berlaku',
            ],
            (object)[
                'id' => 2,
                'nama_berkas' => 'KK',
                'deskripsi' => 'Kartu Keluarga terbaru',
            ],
            (object)[
                'id' => 3,
                'nama_berkas' => 'Ijazah',
                'deskripsi' => 'Fotokopi ijazah terakhir',
            ],
        ];

        return view('index', compact('berkas'));
    }
}