<?php

use Illuminate\Support\Facades\{DB, Route};
use App\Models\{Gallery, Post, Profile, Pelayanan, Statistic};
use App\Http\Controllers\{
    GalleryController,
    ProfileController,
    StatisticController,
    BerandaController,
    AuthController
};
use App\Http\Controllers\Admin\{
    PostController,
    PelayananController,
    SocialMediaController,
    CarouselController
};

// --------------------------------------------
// Auth Routes
// --------------------------------------------
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// --------------------------------------------
// Dashboard & User Profile (auth only)
// --------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// --------------------------------------------
// Public - Beranda
// --------------------------------------------
Route::get('/', function () {
    $galleries = Gallery::all();
    $latestPosts = Post::latest()->take(6)->get();
    $pelayanans = Pelayanan::take(6)->get();

    $stat = Statistic::firstOrCreate([], [
        'total_views' => 0,
        'active_services' => 22,
    ]);
    $stat->increment('total_views');

    return view('beranda', [
        'title' => 'Beranda',
        'galleries' => $galleries,
        'beranda' => $latestPosts,
        'pelayanans' => $pelayanans,
        'stat' => $stat,
        'carouselImages' => Gallery::latest()->take(4)->get(), // tambahkan ini agar tidak error
    ]);
})->name('beranda');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');

// --------------------------------------------
// Informasi & Berita
// --------------------------------------------
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

// --------------------------------------------
// Pelayanan
// --------------------------------------------
Route::get('/layanan', fn() => view('pelayanan', [
    'pelayanans' => Pelayanan::all()
]))->name('layanan.index');

Route::get('/layanan/{id}', function ($id) {
    $pelayanan = Pelayanan::find($id);
    abort_if(!$pelayanan, 404);

    $details = DB::table('detail_pelayanans')->where('pelayanan_id', $id)->get();
    return view('detail_pelayanan', compact('pelayanan', 'details'));
})->name('layanan.show');

// --------------------------------------------
// Halaman Statis
// --------------------------------------------
Route::get('/profil', [ProfileController::class, 'profile'])->name('profil');
Route::view('/struktur-organisasi', 'struktur', ['title' => 'Struktur Organisasi'])->name('struktur');

// --------------------------------------------
// Galeri (Publik)
// --------------------------------------------
Route::get('/dokumentasi', [GalleryController::class, 'dokumentasi'])->name('dokumentasi');
Route::resource('gallery', GalleryController::class)->only(['index', 'show'])->names('gallery');

// --------------------------------------------
// Admin Routes
// --------------------------------------------
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::resource('galleries', GalleryController::class)->names('galleries');
    Route::resource('posts', PostController::class)->names('posts');
    Route::resource('pelayanans', PelayananController::class)->names('pelayanans');

    Route::resource('profile', ProfileController::class)->only([
        'index', 'create', 'store', 'edit', 'update'
    ])->names('profile');

    // Admin Sosial Media
    Route::get('sosmed', [SocialMediaController::class, 'index'])->name('sosmed.index');
    Route::get('sosmed/create/{platform}', [SocialMediaController::class, 'create'])->name('sosmed.create');
    Route::post('sosmed/store', [SocialMediaController::class, 'store'])->name('sosmed.store');
    Route::get('sosmed/{platform}/edit', [SocialMediaController::class, 'edit'])->name('sosmed.edit');
    Route::put('sosmed/update', [SocialMediaController::class, 'update'])->name('sosmed.update');
    Route::delete('sosmed/{platform}', [SocialMediaController::class, 'destroy'])->name('sosmed.destroy');

    // Admin Carousel
    Route::resource('carousel', CarouselController::class)->names('carousel');
});
