<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Menampilkan daftar galeri dengan pagination
    public function index()
    {
        $galleries = Gallery::paginate(10); // Paginate the galleries
        return view('gallery.index', compact('galleries'));
    }

    // Form untuk menambah galeri
    public function create()
    {
        return view('gallery.create');
    }

    // Menyimpan gambar baru ke galeri
    public function store(Request $request)
    {
        // Validasi input gambar
        $validated = $request->validate([
            'title' => 'required|string|max:255',  // Validasi title
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi file image
        ]);

        // Menangani upload file gambar
        if ($request->hasFile('image')) {
            // Menyimpan gambar ke storage
            $imagePath = $request->file('image')->store('galleries', 'public');
        } else {
            // Jika tidak ada gambar, tampilkan pesan error
            return redirect()->back()->withErrors(['image' => 'Gambar diperlukan!']);
        }

        // Menyimpan informasi ke tabel gallery
        Gallery::create([
            'title' => $validated['title'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    // Menghapus gambar dari galeri
    public function destroy($id)
    {
        // Mencari data galeri berdasarkan ID
        $gallery = Gallery::findOrFail($id);

        // Menghapus gambar dari storage jika ada
        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        // Menghapus data galeri dari database
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
