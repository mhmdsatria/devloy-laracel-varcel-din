<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/visi-misi', function () {
    return view('visiMisi');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/pelayanan', function () {
    return view('pelayanan');
});

Route::get('/informasi', function () {
    return view('informasi');
});

Route::get('/motto', function () {
    return view('motto');
});

Route::get('/tujuan', function () {
    return view('tujuan');
});
Route::get('/', function () {
    return view('layouts.master');
});
Route::get('/struktur-organisasi', function () {
    return view('struktur', ['title' => 'Struktur Organisasi']);
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/login/admin', function () {
    return view('pagelogin');
});

Route::get('/daftar', function () {
    return view('daftar');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__ . '/auth.php';

// Route::get('/tenaga-kesehatan', function () {
//     return view('layouts.nakes.index');
// })->name('nakes.index');
// Route::get('/tenaga-kesehatan/create', function () {
//     return view('layouts.nakes.create');
// })->name('nakes.create');
// Route::get('/tenaga-kesehatan/edit', function () {
//     return view('layouts.nakes.edit');
// })->name('nakes.edit');

// Route::get('/pasien', function () {
//     return view('layouts.pasien.index');
// })->name('pasien.index');
// Route::get('/pasien/create', function () {
//     return view('layouts.pasien.create');
// })->name('pasien.create');
// Route::get('/pasien/edit', function () {
//     return view('layouts.pasien.edit');
// })->name('pasien.edit');

// Route::get('/petugas', function () {
//     return view('layouts.petugas.index');
// })->name('petugas.index');
// Route::get('/petugas/create', function () {
//     return view('layouts.petugas.create');
// })->name('petugas.create');
// Route::get('/petugas/edit', function () {
//     return view('layouts.petugas.edit');
// })->name('petugas.edit');
