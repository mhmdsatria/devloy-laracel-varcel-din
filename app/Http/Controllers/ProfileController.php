<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    // Halaman profil publik
    public function profile()
    {
        $profile = Profile::latest()->first();
        return view('profil', compact('profile'));
    }

    // Untuk admin melihat data profile
    public function index()
    {
        $profile = Profile::latest()->first();
        return view('admin.profile.index', compact('profile'));
    }

    public function create()
{
    $profile = \App\Models\Profile::first();

    if ($profile) {
        return redirect()->route('admin.profile.edit', $profile->id);
    }

    return view('admin.profile.create');
}


    public function store(Request $request)
    {
        $request->validate([
            'nama_puskesmas' => 'required|string|max:255',
            'email' => 'required|email',
            'struktur_organisasi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_puskesmas', 'email']);

        if ($request->hasFile('struktur_organisasi')) {
            $data['struktur_organisasi'] = $request->file('struktur_organisasi')->store('struktur', 'public');
        }

        Profile::create($data);

        return redirect()->route('admin.profile.index')->with('success', 'Berhasil disimpan!');

    }
    public function edit(Profile $profile)
{
    return view('admin.profile.edit', compact('profile'));
}

public function update(Request $request, Profile $profile)
{
    $validated = $request->validate([
        'nama_puskesmas' => 'required|string|max:255',
        'email' => 'required|email',
        'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('struktur_organisasi')) {
        $path = $request->file('struktur_organisasi')->store('struktur', 'public');
        $validated['struktur_organisasi'] = $path;
    }

    $profile->update($validated);

    return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui.');
}
}
