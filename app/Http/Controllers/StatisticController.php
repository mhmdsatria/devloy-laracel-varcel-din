<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Statistic;
use Illuminate\Support\Carbon;

class StatisticController extends Controller
{
    public function beranda()
    {
        $stat = Statistic::firstOrCreate([], [
            'total_views' => 0,
            'weekly_views' => 0,
            'monthly_views' => 0,
            'active_services' => 22,
            'weekly_reset_date' => now(),
            'monthly_reset_date' => now(),
        ]);

        $today = Carbon::today();

        // Reset weekly views jika sudah 7 hari sejak reset terakhir
        if (!$stat->weekly_reset_date || $today->diffInDays(Carbon::parse($stat->weekly_reset_date)) >= 7) {
            $stat->weekly_views = 0;
            $stat->weekly_reset_date = $today;
        }

        // Reset monthly views jika sudah masuk bulan baru
        if (!$stat->monthly_reset_date || Carbon::parse($stat->monthly_reset_date)->format('m') !== $today->format('m')) {
            $stat->monthly_views = 0;
            $stat->monthly_reset_date = $today;
        }

        // Tambahkan kunjungan
        $stat->increment('total_views');
        $stat->increment('weekly_views');
        $stat->increment('monthly_views');

        $stat->save();

        $galleries = Gallery::latest()->take(6)->get();

        return view('beranda', [
            'title' => 'Beranda',
            'galleries' => $galleries,
            'stat' => $stat,
        ]);
    }
}
