<?php
namespace App\Http\Controllers;

use App\Models\Jenis_Surat;
use App\Models\Media;
use App\Models\PermohonanSurat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PermohonanSuratController extends Controller
{
    public function index(Request $request)
    {
        $data['jenisSurat'] = Jenis_Surat::select('jenis_id', 'nama_jenis')
            ->orderBy('nama_jenis')
            ->get();

        $query = PermohonanSurat::with(['jenisSurat', 'warga', 'attachments']);

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->orWhere('nomor_permohonan', 'like', "%{$search}%")
                    ->orWhere('catatan', 'like', "%{$search}%")
                    ->orWhereHas('warga', function ($w) use ($search) {
                        $w->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        $data['permohonan'] = $query->paginate(10)->withQueryString();

        return view('pages.permohonanSurat.index', $data);
    }

    public function create()
    {
        $jenis_surat = Jenis_Surat::all();
        // Ambil semua data warga untuk dropdown pilihan
        $warga = Warga::all();

        return view('pages.permohonanSurat.create', compact('jenis_surat', 'warga'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'pemohon_warga_id' => 'required|exists:warga,warga_id', // Pastikan input warga dipilih
            'jenis_id'         => 'required|exists:jenis_surat,jenis_id',
            'files.*'          => 'nullable|mimes:jpg,jpeg,png,pdf,docx|max:10240',
        ]);

        // 2. GENERATE NOMOR SURAT OTOMATIS (Fix Duplicate Entry)
        $tahun     = date('Y');
        $lastSurat = PermohonanSurat::whereYear('created_at', $tahun)->latest('created_at')->first();

        if ($lastSurat) {
            // Ambil 3 digit terakhir dari nomor sebelumnya (misal PS/2025/005 -> ambil 005)
            $lastNumber = (int) substr($lastSurat->nomor_permohonan, -3);
            $newNumber  = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format ulang jadi 3 digit (001, 002, dst)
        $nomorUrut       = str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        $nomorPermohonan = "PS/{$tahun}/{$nomorUrut}"; // Hasil: PS/2025/001

        // 3. Simpan Data Permohonan
        $permohonan = PermohonanSurat::create([
            'nomor_permohonan'  => $nomorPermohonan, // Pakai nomor otomatis

            // FIX: Gunakan nama input yang benar sesuai form HTML
            'pemohon_warga_id'  => $request->pemohon_warga_id,

            'jenis_id'          => $request->jenis_id,
            'tanggal_pengajuan' => now(),
            'status'            => 'Menunggu',
            'catatan'           => $request->catatan,
        ]);

        // 4. Upload File (Fix ref_id null -> Pastikan Model juga sudah diperbaiki)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/permohonan_surat', $filename, 'public');

                Media::create([
                    'ref_table'  => 'permohonan_surat',
                    'ref_id'     => $permohonan->permohonan_id, // Pastikan Model PK benar
                    'file_name'  => $filename,
                    'caption'    => $file->getClientOriginalName(),
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil dikirim dengan nomor: ' . $nomorPermohonan);
    }


    public function edit(string $id)
    {
        $permohonan  = PermohonanSurat::with('attachments')->findOrFail($id);
        $jenis_surat = Jenis_Surat::all();
        $warga   = Warga::all(); // Perlu data warga juga untuk edit

        return view('pages.permohonanSurat.edit', compact('permohonan', 'jenis_surat', 'warga'));
    }

    public function update(Request $request, string $id)
    {
        $permohonan = PermohonanSurat::findOrFail($id);

        $request->validate([
            'nomor_permohonan' => 'required|string',
            'pemohon_warga_id' => 'required|exists:warga,warga_id',
            'jenis_id'         => 'required|exists:jenis_surat,jenis_id',
            'files.*'          => 'nullable|mimes:jpg,jpeg,png,pdf,docx|max:10240',
        ]);

        // Update data
        $permohonan->update([
            'nomor_permohonan'  => $request->nomor_permohonan,
            'pemohon_warga_id'  => $request->pemohon_warga_id, // Bisa ganti pemohon saat edit
            'jenis_id'          => $request->jenis_id,
            'catatan'           => $request->catatan ?? $permohonan->catatan,
            'tanggal_pengajuan' => $request->tanggal_pengajuan ?? $permohonan->tanggal_pengajuan,
        ]);

        // Upload Tambahan
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/permohonan_surat', $filename, 'public');

                Media::create([
                    'ref_table'  => 'permohonan_surat',
                    'ref_id'     => $permohonan->permohonan_id,
                    'file_name'  => $filename,
                    'caption'    => $file->getClientOriginalName(),
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $permohonan = PermohonanSurat::findOrFail($id);

        $mediaItems = Media::where('ref_table', 'permohonan_surat')
            ->where('ref_id', $permohonan->permohonan_id)
            ->get();

        foreach ($mediaItems as $media) {
            Storage::disk('public')->delete('uploads/permohonan_surat/' . $media->file_name);
            $media->delete();
        }

        $permohonan->delete();

        return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil dihapus.');
    }

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id);
        $path  = 'uploads/permohonan_surat/' . $media->file_name;

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $media->delete();

        return back()->with('success', 'Lampiran berhasil dihapus.');
    }
}
