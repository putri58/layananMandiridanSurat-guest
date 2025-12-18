<?php
namespace App\Http\Controllers;

use App\Models\RiwayatStatusSurat;
use App\Models\PermohonanSurat;
use App\Models\Warga;
use Illuminate\Http\Request;

class RiwayatStatusSuratController extends Controller
{
    public function index()
    {
        $data = RiwayatStatusSurat::with(['permohonan', 'petugas'])
            ->latest('waktu')
            ->paginate(10);

        return view('pages.riwayat.index', compact('data'));
    }

    public function create()
    {
        $permohonans = PermohonanSurat::all();
        $petugas = Warga::all();

        return view('pages.riwayat.create', compact('permohonans', 'petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'permohonan_id' => 'required|exists:permohonan_surat,permohonan_id',
            'status' => 'required|string|max:100',
            'petugas_warga_id' => 'required|exists:warga,id',
            'keterangan' => 'nullable|string',
        ]);

        RiwayatStatusSurat::create([
            'permohonan_id' => $request->permohonan_id,
            'status' => $request->status,
            'petugas_warga_id' => $request->petugas_warga_id,
            'keterangan' => $request->keterangan,
            'waktu' => now(),
        ]);

        return redirect()->route('riwayat.index')
            ->with('success', 'Riwayat status berhasil ditambahkan');
    }

    public function edit(RiwayatStatusSurat $riwayat_status_surat)
{
    $permohonans = PermohonanSurat::all();
    $petugas = Warga::all();

    return view(
        'pages.riwayat.edit',
        [
            'riwayat' => $riwayat_status_surat,
            'permohonans' => $permohonans,
            'petugas' => $petugas
        ]
    );
}


    public function update(Request $request, RiwayatStatusSurat $riwayat_status_surat)
    {
        $request->validate([
            'status' => 'required|string|max:100',
            'petugas_warga_id' => 'required|exists:warga,id',
            'keterangan' => 'nullable|string',
        ]);

        $riwayat_status_surat->update([
            'status' => $request->status,
            'petugas_warga_id' => $request->petugas_warga_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('riwayat.index')
            ->with('success', 'Riwayat status berhasil diperbarui');
    }

    public function destroy(RiwayatStatusSurat $riwayat_status_surat)
    {
        $riwayat_status_surat->delete();

        return back()->with('success', 'Riwayat status berhasil dihapus');
    }
}

