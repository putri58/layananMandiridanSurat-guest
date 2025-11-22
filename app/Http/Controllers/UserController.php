<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterable = ['email_domain'];
        $searchable = ['name', 'email'];
        $data['user'] = User::filter($request, $filterable)
            ->search($request, $searchable)
            ->paginate(10)
            ->withQueryString();

        return view('pages.user.index', $data);

    }

    //---------------------------------------------------------

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create'); // <-- Tampilkan view form tambah user
    }

    //---------------------------------------------------------

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name']                  = $request->name;
        $data['email']                 = $request->email;
        $data['password']              = $data['password']              = Hash::make($request->password);
        $data['password_confirmation'] = $request->password_confirmation;

        User::create($data);
        return redirect()->route('user.create')->with('success', 'Penambahan Data Berhasil!');
    }

    //---------------------------------------------------------

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    //---------------------------------------------------------

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        return view('pages.user.edit', $data);
    }

    //---------------------------------------------------------

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    //---------------------------------------------------------

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
