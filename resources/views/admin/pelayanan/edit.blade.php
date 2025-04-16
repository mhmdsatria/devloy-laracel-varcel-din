@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">{{ isset($pelayanan) ? 'Edit' : 'Tambah' }} Pelayanan</h1>

    <form action="{{ isset($pelayanan) ? route('admin.pelayanans.update', $pelayanan->id) : route('admin.pelayanans.store') }}" method="POST">
        @csrf
        @if(isset($pelayanan))
            @method('PUT')
        @endif
        
        <div class="mb-4">
            <label class="block font-semibold">Judul</label>
            <input type="text" name="title" value="{{ $pelayanan->title ?? '' }}" class="w-full border p-2 rounded focus:ring focus:ring-blue-300" required>
        </div>
        
        <div class="mb-4">
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="description" class="w-full border p-2 rounded focus:ring focus:ring-blue-300" required>{{ $pelayanan->description ?? '' }}</textarea>
        </div>
        
        <div class="mb-4">
            <label class="block font-semibold">Hari</label>
            <input type="text" name="days" value="{{ $pelayanan->days ?? '' }}" class="w-full border p-2 rounded focus:ring focus:ring-blue-300" required>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            {{ isset($pelayanan) ? 'Update' : 'Simpan' }}
        </button>
        <a href="{{ route('admin.pelayanans.index') }}" class="block text-center text-gray-600 mt-3 hover:underline">Batal</a>
    </form>
</div>
@endsection
