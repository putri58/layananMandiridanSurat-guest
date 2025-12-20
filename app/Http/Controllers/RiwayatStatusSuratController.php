<?php

namespace App\Http\Controllers;

use App\Models\RiwayatStatusSurat;
use Illuminate\Support\Facades\Auth;

class RiwayatStatusSuratController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $data = RiwayatStatusSurat::with(['permohonan', 'petugas'])
        ->whereHas('permohonan', function ($q) use ($user) {
            $q->where('pemohon_warga_id', $user->id);
        })
        ->orderBy('waktu', 'desc')
        ->paginate(10);

    return view('pages.riwayat.index', compact('data'));
}

}
