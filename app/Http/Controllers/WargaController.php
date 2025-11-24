<?php

namespace App\Http\Controllers;

use App\Models\warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $data['filter'] = Warga::select('gender')->distinct()->get();
    $filterablecolumns = ['gender'];
    $searchablecolumns = ['nama', 'email', 'telp'];

    $data['warga'] = Warga::filter($request, $filterablecolumns)
        ->search($request, $searchablecolumns)
        ->paginate(10)
        ->withQueryString();

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
    public function edit($id)
{
    $warga = Warga::findOrFail($id);
    return view('pages.warga.edit', compact('warga'));
}

public function update(Request $request, $id)
{
    $warga = Warga::findOrFail($id);
    $warga->update($request->all());

    return redirect()->route('warga.index')->with('info', 'Data berhasil diperbarui!');
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
