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
    $data['jenisSurat'] = Jenis_Surat::select('jenis_id', 'nama_jenis')
        ->orderBy('nama_jenis')
        ->get();

    $query = PermohonanSurat::with('jenisSurat');

    // if ($request->filled('jenis_id')) {
    //     $query->where('jenis_id', $request->input('jenis_id'));
    // }

    if ($request->filled('status')) {
        $query->where('status', $request->input('status'));
    }

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->orWhere('nomor_permohonan', 'like', "%{$search}%")
              ->orWhere('catatan', 'like', "%{$search}%");
        });
    }

    $data['permohonan'] = $query->paginate(10)->withQueryString();

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
