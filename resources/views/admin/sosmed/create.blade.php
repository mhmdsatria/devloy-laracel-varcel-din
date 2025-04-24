@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Tambahkan Profil Puskesmas</h2>

    <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Puskesmas --}}
        <div class="mb-4">
            <label>Nama Puskesmas</label>
            <input type="text" name="nama_puskesmas" value="{{ old('nama_puskesmas') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Struktur Organisasi --}}
        <div class="mb-4">
            <label>Struktur Organisasi</label>
            <input type="file" name="struktur_organisasi" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan Profil
        </button>
    </form>
</div>
@endsection
