<?php
namespace App\Http\Controllers;

use App\Models\Jenis_Surat;
use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class PermohonanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Dropdown filter - tidak duplikat
    $data['jenisSurat'] = Jenis_Surat::select('jenis_id', 'nama_jenis')
        ->distinct()
        ->orderBy('nama_jenis')
        ->get();

    // Kolom yang boleh difilter
    $filterable = ['status', 'jenis_id'];

    // Kolom yang bisa dicari
    $searchable = ['nomor_permohonan', 'catatan'];

    // Query utama
    $data['permohonan'] = PermohonanSurat::with('jenisSurat')
        ->filter($request, $filterable)
        ->search($request, $searchable)
        ->paginate(10)
        ->withQueryString();

    return view('pages.permohonanSurat.index', $data);
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
        PermohonanSurat::create([
            'nomor_permohonan'  => $request->nomor_permohonan,
            'pemohon_warga_id'  => auth()->user()->warga_id,
            'jenis_id'          => $request->jenis_id,
            'tanggal_pengajuan' => now(),
            'status'            => 'Menunggu',
        ]);

        return back()->with('success', 'Permohonan berhasil dibuat!');
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
