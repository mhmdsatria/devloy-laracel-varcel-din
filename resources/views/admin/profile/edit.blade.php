@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-lg font-bold mb-4">Edit Profil</h2>

    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nama Puskesmas</label>
            <input type="text" name="nama_puskesmas" value="{{ old('nama_puskesmas', $profile->nama_puskesmas) }}"
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Struktur Organisasi (Gambar)</label>
            <input type="file" name="struktur_organisasi" class="w-full border px-3 py-2 rounded">
            @if ($profile->struktur_organisasi)
                <img src="{{ asset('storage/' . $profile->struktur_organisasi) }}" class="w-32 mt-2 rounded shadow" alt="">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
