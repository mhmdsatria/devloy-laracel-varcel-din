<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan data
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    // Menampilkan form create
    public function create()
    {
        return view('profile.create');
    }

    // Menyimpan data
    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
            'motto' => 'required',
            'struktur_organisasi' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file
        $file = $request->file('struktur_organisasi')->store('public/struktur');

        Profile::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan,
            'motto' => $request->motto,
            'struktur_organisasi' => $file,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profile berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', compact('profile'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
            'motto' => 'required',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('struktur_organisasi')) {
            $data['struktur_organisasi'] = $request->file('struktur_organisasi')->store('public/struktur');
        }

        $profile->update($data);

        return redirect()->route('profile.index')->with('success', 'Profile berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus!');
    }
}
