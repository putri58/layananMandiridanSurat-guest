<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_Surat;

class jenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    // untuk dropdown filter (distinct)
    $data['filter'] = Jenis_Surat::select('kode')->distinct()->get();
    // kolom mana saja yang bisa difilter
    $filterablecolumns = ['kode'];
    // kolom yg bisa dicari
    $searchablecolumns = ['nama_jenis', 'kode'];
    $data['jenisSurat'] = Jenis_Surat::filter($request, $filterablecolumns, $searchablecolumns)
        ->search($request, $searchablecolumns)
        ->paginate(10)
        ->withQueryString();
    return view('pages.jenisSurat.tabelJenis', $data);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jenisSurat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['kode'] = $request->kode;
		$data['nama_jenis'] = $request->nama_jenis;
		$data['syarat_json'] = $request->syarat_json;

		Jenis_Surat::create($data);

		// return redirect()->route('jenis-surat.index')->with('success','Penambahan Data Berhasil!');
        return view('pages.responJenis')->with('success','Penambahan Data Berhasil!');
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
