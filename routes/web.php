<?php

use Illuminate\Support\Facades\{DB, Route};
use App\Models\{Gallery, Post, Profile, Pelayanan, Statistic, Carousel};
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
// Dashboard & User Routes (auth only)
// --------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// --------------------------------------------
// Public Routes - Beranda, Info, Galeri, etc
// --------------------------------------------
Route::get('/', function () {
    $galleries = Gallery::all();
    $latestPosts = Post::latest()->take(6)->get();
    $pelayanans = Pelayanan::take(6)->get();
    $carousels = Carousel::take(3)->get();

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
        'carousels' => $carousels,
    ]);
})->name('beranda');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');
Route::get('/dokumentasi', [GalleryController::class, 'dokumentasi'])->name('dokumentasi');
Route::resource('gallery', GalleryController::class)->only(['index', 'show']);

// --------------------------------------------
// Halaman Statis & Profil Publik
// --------------------------------------------
Route::get('/user-profile', [AuthController::class, 'profile'])->name('user.profile');
Route::get('/profil', [ProfileController::class, 'profile'])->name('profil');
Route::view('/struktur-organisasi', 'struktur', ['title' => 'Struktur Organisasi'])->name('struktur');

// --------------------------------------------
// Berita
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
Route::get('/layanan', function () {
    $pelayanans = Pelayanan::all();
    return view('pelayanan', compact('pelayanans'));
})->name('layanan.index');

Route::get('/layanan/{id}', function ($id) {
    $pelayanan = Pelayanan::find($id);
    $details = DB::table('detail_pelayanans')->where('pelayanan_id', $id)->get();

    abort_if(!$pelayanan, 404);

    return view('detail_pelayanan', compact('pelayanan', 'details'));
})->name('layanan.show');

// --------------------------------------------
// Admin Routes
// --------------------------------------------
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    // Admin Carousels
    Route::resource('carousels', CarouselController::class);

    // Admin Galeri
    Route::resource('galleries', GalleryController::class)->names('galleries');

    // Admin Berita
    Route::resource('posts', PostController::class)->names('posts');

    // Admin Pelayanan
    Route::resource('pelayanans', PelayananController::class)->names('pelayanans');

    // Admin Profile
    Route::resource('profile', ProfileController::class)->names('profile')->only([
        'index', 'create', 'store', 'edit', 'update'
    ]);

    // Admin Sosial Media
    Route::prefix('sosmed')->name('sosmed.')->group(function () {
        Route::get('/', [SocialMediaController::class, 'index'])->name('index');
        Route::get('create/{platform}', [SocialMediaController::class, 'create'])->name('create');
        Route::post('store', [SocialMediaController::class, 'store'])->name('store');
        Route::get('{platform}/edit', [SocialMediaController::class, 'edit'])->name('edit');
        Route::put('update', [SocialMediaController::class, 'update'])->name('update');
        Route::delete('{platform}', [SocialMediaController::class, 'destroy'])->name('destroy');
    });
});

// --------------------------------------------
// Dokumentasi Galeri untuk Publik (Duplicate check!)
// --------------------------------------------
Route::get('/gallery', [GalleryController::class, 'dokumentasi'])->name('gallery.index');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
