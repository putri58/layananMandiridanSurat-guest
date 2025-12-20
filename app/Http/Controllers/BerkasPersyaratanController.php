<?php

namespace App\Http\Controllers;

use App\Models\Berkas_Persyaratan;
use App\Models\PermohonanSurat;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BerkasPersyaratanController extends Controller
{
    /* =========================
     * INDEX
     * ========================= */
    public function index()
    {
        $user = Auth::user();

        if (in_array($user->role, ['warga', 'guest'])) {
            $permohonanId = PermohonanSurat::where('warga_id', $user->id)
                ->pluck('permohonan_id');

            $berkas = Berkas_Persyaratan::with('permohonanSurat')
                ->whereIn('permohonan_id', $permohonanId)
                ->latest()
                ->paginate(10);
        } else {
            $berkas = Berkas_Persyaratan::with('permohonanSurat', 'media')
                ->latest()
                ->paginate(10);
        }

        return view('pages.berkas.index', compact('berkas'));
    }

    /* =========================
     * CREATE (INI YANG PENTING)
     * ========================= */
    public function create()
    {
        $user = Auth::user();

        $query = PermohonanSurat::with(['pemohon', 'jenisSurat'])
            ->where('status', '!=', 'selesai')
            ->orderByDesc('created_at');

        if (in_array($user->role, ['warga', 'guest'])) {
            $query->where('warga_id', $user->id);
        }

        $permohonan = $query->get();

        return view('pages.berkas.create', compact('permohonan'));
    }
    public function edit($id)
{
    $berkas = Berkas_Persyaratan::with([
        'permohonanSurat.pemohon',
        'media'
    ])->findOrFail($id);

    $user = Auth::user();

    // Proteksi akses
    if (in_array($user->role, ['warga', 'guest']) &&
        $berkas->permohonanSurat->warga_id !== $user->id) {
        return redirect()->route('berkas.index')
            ->with('error', 'Anda tidak memiliki akses.');
    }

    // Permohonan untuk dropdown
    if (in_array($user->role, ['warga', 'guest'])) {
        $permohonan = PermohonanSurat::with(['pemohon', 'jenisSurat'])
            ->where('warga_id', $user->id)
            ->get();
    } else {
        $permohonan = PermohonanSurat::with(['pemohon', 'jenisSurat'])->get();
    }

    return view('pages.berkas.edit', compact('berkas', 'permohonan'));
}
public function update(Request $request, $id)
{
    $berkas = Berkas_Persyaratan::findOrFail($id);

    $request->validate([
        'nama_berkas' => 'required|string|max:255',
        'berkas_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('berkas_file')) {
        $file = $request->file('berkas_file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->storeAs('berkas', $fileName, 'public');

        Media::where('ref_table', 'berkas')
            ->where('ref_id', $berkas->berkas_id)
            ->delete();

        Media::create([
            'ref_table' => 'berkas',
            'ref_id' => $berkas->berkas_id,
            'file_name' => $fileName,
            'mime_type' => $file->getClientMimeType(),
            'caption' => $request->nama_berkas,
            'sort_order' => 1,
        ]);
    }

    $berkas->update([
        'nama_berkas' => $request->nama_berkas,
        'valid' => false,
    ]);

    return redirect()->route('berkas.index')
        ->with('success', 'Berkas berhasil diperbarui');
}



    /* =========================
     * STORE
     * ========================= */
    public function store(Request $request)
{
    $request->validate([
        'permohonan_id' => 'required|exists:permohonan_surat,permohonan_id',
        'nama_berkas'   => 'required|string|max:255',
        'berkas_file'   => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $file = $request->file('berkas_file');
    $fileName = time().'_'.$file->getClientOriginalName();
    $file->storeAs('berkas', $fileName, 'public');

    $berkas = Berkas_Persyaratan::create([
        'permohonan_id' => $request->permohonan_id,
        'nama_berkas'   => $request->nama_berkas,
        'valid'         => false,
    ]);

    Media::create([
        'ref_table' => 'berkas',
        'ref_id'    => $berkas->berkas_id,
        'file_name' => $fileName,
        'mime_type' => $file->getClientMimeType(),
        'caption'   => $request->nama_berkas,
        'sort_order'=> 1,
    ]);

    return redirect()->route('berkas.index')
        ->with('success', 'Berkas berhasil diupload.');
}


    /* =========================
     * DELETE FILE
     * ========================= */
    public function deleteFile($id)
    {
        $berkas = Berkas_Persyaratan::findOrFail($id);

        $media = Media::where('ref_table', 'berkas')
            ->where('ref_id', $berkas->berkas_id)
            ->first();

        if ($media) {
            Storage::disk('public')->delete('berkas/'.$media->file_name);
            $media->delete();
            $berkas->update(['valid' => false]);
        }

        return back()->with('success', 'File berhasil dihapus.');
    }
}
