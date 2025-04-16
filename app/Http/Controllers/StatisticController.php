<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Statistic;

class StatisticController extends Controller
{
    public function beranda()
    {
        // Ambil 6 gallery terbaru
        $galleries = Gallery::latest()->take(6)->get();

        // Ambil statistik
        $stat = Statistic::firstOrCreate([], ['total_views' => 0, 'active_services' => 22]);
        $stat->increment('total_views');

        // Pastikan untuk mengirim variabel ke view
        return view('beranda', [
            'title' => 'Beranda',
            'galleries' => $galleries, // Kirim data galleries
            'stat' => $stat, // Kirim data statistik
        ]);
    }
}
