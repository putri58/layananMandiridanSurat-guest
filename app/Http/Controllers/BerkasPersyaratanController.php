<?php

namespace App\Http\Controllers;

use App\Models\Berkas_Persyaratan;
use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class BerkasPersyaratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // PERBAIKAN: 'permohonanSurat' bukan 'permohonan'
        $berkas = Berkas_Persyaratan::with('permohonanSurat')->latest()->paginate(10);
        return view('pages.berkas.index', compact('berkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // PERBAIKAN: Hapus eager loading jika error
        try {
            $permohonans = PermohonanSurat::with('jenisSurat')
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            // Fallback jika error
            $permohonans = PermohonanSurat::orderBy('created_at', 'desc')->get();
        }
        
        return view('pages.berkas.create', compact('permohonans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
    'permohonan_surat_id' => 'required',
    'nama_berkas' => 'required|string|max:255',
    'media.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
]);

    Berkas::create([
        'permohonan_surat_id' => $request->permohonan_surat_id,
        'nama_berkas' => $request->nama_berkas,
        'valid' => $request->has('valid'),
    ]);

    return redirect()->route('berkas.index')
        ->with('success', 'Berkas berhasil ditambahkan');
    
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // PERBAIKAN: Gunakan find() karena route model binding tidak cocok
        $berkas = Berkas_Persyaratan::with('permohonanSurat')->findOrFail($id);
        return view('pages.berkas.show', compact('berkas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berkas = Berkas_Persyaratan::findOrFail($id);
        try {
            $permohonans = PermohonanSurat::with('jenisSurat')
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            $permohonans = PermohonanSurat::orderBy('created_at', 'desc')->get();
        }
        return view('pages.berkas.edit', compact('berkas', 'permohonans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // PERBAIKAN: 'permohonan_surat_id' bukan 'permohonan_id'
        $request->validate([
            'permohonan_surat_id' => 'required|exists:permohonan_surat,permohonan_id',
            'nama_berkas' => 'required|string|max:255',
            'valid' => 'boolean'
        ]);

        $berkas = Berkas_Persyaratan::findOrFail($id);
        
        // PERBAIKAN: 'permohonan_surat_id' bukan 'permohonan_id'
        $berkas->update([
            'permohonan_surat_id' => $request->permohonan_surat_id,
            'nama_berkas' => $request->nama_berkas,
            'valid' => $request->valid ?? false
        ]);
        foreach ($request->file('media', []) as $file) {
    $path = $file->store('berkas', 'public');

    Media::create([
        'ref_table' => 'berkas',
        'ref_id'    => $berkas->berkas_id,
        'nama_file' => $file->getClientOriginalName(),
        'path'      => $path,
    ]);
}


        return redirect()->route('berkas.index')->with('success', 'Berkas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berkas = Berkas_Persyaratan::findOrFail($id);
        $berkas->delete();

        return redirect()->route('berkas.index')->with('success', 'Berkas berhasil dihapus.');
    }
}