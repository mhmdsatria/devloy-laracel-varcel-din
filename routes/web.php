<?php

use Illuminate\Support\Facades\{DB, Route};
use App\Models\{Gallery, Post, Profile, Pelayanan, Statistic};
use App\Http\Controllers\{
    GalleryController,
    ProfileController,
    StatisticController,
    BerandaController
};
use App\Http\Controllers\Admin\{
    PostController,
    PelayananController
};

/**
 * --------------------------------------------
 * Routes Utama (Public)
 * --------------------------------------------
 */
Route::get('/', function () {
    $galleries = Gallery::all(); 
    $latestPosts = Post::latest()->take(6)->get();
    $pelayanans = Pelayanan::take(6)->get();

    $stat = Statistic::firstOrCreate([], [
        'total_views' => 0,
        'active_services' => 22
    ]);
    $stat->increment('total_views');

    return view('beranda', [
        'title' => 'Beranda',
        'galleries' => $galleries,
        'beranda' => $latestPosts,
        'pelayanans' => $pelayanans,
        'stat' => $stat,
    ]);
})->name('beranda');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');
Route::get('/dokumentasi', [GalleryController::class, 'dokumentasi'])->name('dokumentasi');
Route::resource('gallery', GalleryController::class); // Public akses galeri

/**
 * --------------------------------------------
 * Routes Halaman Statis
 * --------------------------------------------
 */
Route::view('/profile', 'profile')->name('profile');
Route::view('/visi-misi', 'visiMisi')->name('visiMisi');
Route::view('/kontak', 'kontak')->name('kontak');
Route::view('/tujuan', 'tujuan')->name('tujuan');
Route::view('/struktur-organisasi', 'struktur', ['title' => 'Struktur Organisasi'])->name('struktur');

/**
 * --------------------------------------------
 * Routes Berita (Post) Umum
 * --------------------------------------------
 */
Route::get('/berita', function () {
    return view('informasi', [
        'title' => 'Blog',
        'informasi' => Post::filter()->simplePaginate(12),
    ]);
})->name('berita');

Route::get('/informasi/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => 'Single Post',
        'post' => $post,
    ]);
})->name('informasi.show');

/**
 * --------------------------------------------
 * Routes Pelayanan Umum
 * --------------------------------------------
 */
Route::get('/layanan', function () {
    $pelayanans = DB::table('pelayanans')->get();
    return view('pelayanan', compact('pelayanans'));
})->name('layanan.index');

Route::get('/layanan/{id}', function ($id) {
    $pelayanan = DB::table('pelayanans')->where('id', $id)->first();
    $details = DB::table('detail_pelayanans')->where('pelayanan_id', $id)->get();

    abort_if(!$pelayanan, 404);

    return view('detail_pelayanan', compact('pelayanan', 'details'));
})->name('layanan.show');

/**
 * --------------------------------------------
 * Routes Admin (Prefix: /admin)
 * --------------------------------------------
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    // Admin Galeri (dokumentasi)
    Route::resource('galleries', GalleryController::class)->names('galleries');

    // Admin Berita
    Route::resource('posts', PostController::class)->names('posts');

    // Admin Pelayanan
    Route::resource('pelayanans', PelayananController::class)->names('pelayanans');
});
