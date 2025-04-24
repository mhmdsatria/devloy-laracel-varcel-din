<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::latest()->get();
        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imagePath = $request->file('image')->store('carousel', 'public');
    
        Carousel::create([
            'image' => $imagePath,
        ]);
    
        return redirect()->route('admin.carousel.index')->with('success', 'Gambar berhasil ditambahkan.');
    }
    

    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($carousel->image);
            $path = $request->file('image')->store('carousels', 'public');
            $carousel->update(['image' => $path]);
        }

        return redirect()->route('admin.carousel.index')->with('success', 'Gambar berhasil diperbarui');
    }

    public function destroy(Carousel $carousel)
    {
        Storage::disk('public')->delete($carousel->image);
        $carousel->delete();

        return redirect()->route('admin.carousel.index')->with('success', 'Gambar berhasil dihapus');
    }
}
