<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    // Data statis sebagai pengganti database
    private $jenisSuratData = [
        ['id' => 1, 'kode' => 'SKU', 'nama_jenis' => 'Surat Keterangan Usaha', 'syarat_json' => '{"ktp":true,"domisili":true}'],
        ['id' => 2, 'kode' => 'SKD', 'nama_jenis' => 'Surat Keterangan Domisili', 'syarat_json' => '{"ktp":true,"kk":true}'],
        ['id' => 3, 'kode' => 'SPK', 'nama_jenis' => 'Surat Pengantar KTP', 'syarat_json' => '{"kk":true,"pengantar_rt":true}'],
        ['id' => 4, 'kode' => 'SKM', 'nama_jenis' => 'Surat Keterangan Kematian', 'syarat_json' => '{"kk_meninggal":true,"surat_rs":true}'],
    ];

    public function index()
    {
        $jenis_surat = $this->jenisSuratData; // Ambil data statis
        return view('jenis-surat.index', compact('jenis_surat'));
    }

    public function show($id)
    {
        // Cari jenis surat berdasarkan ID
        $surat = null;
        foreach ($this->jenisSuratData as $item) {
            if ($item['id'] == $id) {
                $surat = $item;
                break;
            }
        }

        if (!$surat) {
            abort(404, 'Jenis Surat tidak ditemukan'); // Tampilkan error 404 jika tidak ada
        }
        
        return view('jenis-surat.show', compact('surat'));
    }
}