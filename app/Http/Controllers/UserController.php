<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] =
                $request->file('profile_picture')->store('profile', 'public');
        }

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()
            ->route('user.create')
            ->with('success', 'Penambahan Data Berhasil!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        if ($user->profile_picture && \Storage::disk('public')->exists($user->profile_picture)) {
            \Storage::disk('public')->delete($user->profile_picture);
        }

        $validated['profile_picture'] =
            $request->file('profile_picture')->store('profile', 'public');
    }

    if ($request->filled('password')) {
        $validated['password'] = \Hash::make($request->password);
    } else {
        unset($validated['password']);
    }

    $user->update($validated);

    return redirect()
        ->route('user.index')
        ->with('success', 'User berhasil diperbarui!');
}

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil dihapus!');
    }
}
