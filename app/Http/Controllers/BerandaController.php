<?php

namespace App\Http\Controllers;

use App\Models\Gallery; // Import model Gallery

class BerandaController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel galleries
        $galleries = Gallery::all();

        // Mengirim data ke view 'beranda'
        return view('beranda', compact('galleries'));
    }
}
