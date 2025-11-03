<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warga;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $data['warga'] = Warga::all();
           return view('pages.warga.tabelWarga', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('pages.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data['no_ktp'] = $request->no_ktp;
		$data['nama'] = $request->nama;
		$data['gender'] = $request->gender;
		$data['agama'] = $request->agama;
		$data['pekerjaan'] = $request->pekerjaan;
		$data['phone'] = $request->phone;
        $data['email'] = $request->email;

		warga::create($data);

		// return redirect()->route('warga.index')->with('success','Penambahan Data Berhasil!');
        return view('pages.responWarga')->with('success', 'Penambahan Data Berhasil!');
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
        $user->delete();
        return redirect()->route('admin.users.index')
                         ->with('success', 'User berhasil dihapus!');
    }
}
