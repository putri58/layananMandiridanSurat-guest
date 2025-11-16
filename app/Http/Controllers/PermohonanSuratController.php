<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use App\Models\Jenis_Surat;

class PermohonanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $data = PermohonanSurat::with('jenisSurat')->get();
        return view('pages.permohonanSurat.index', compact('data'));
    }

    /**
     * Show the fomrm for creating a new resource.
     */
    public function create()
    {
        $jenis_surat = Jenis_Surat::all();
        return view('pages.permohonanSurat.create', compact('jenis_surat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_permohonan' => 'required',
            'jenis_id' => 'required|exists:jenis_surat,jenis_id',
        ]);

        PermohonanSurat::create($request->all());

        return redirect()->route('pages.permohonanSurat.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
