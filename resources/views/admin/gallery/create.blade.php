@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Tambah Gambar Baru</h1>

    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Judul Gambar</label>
            <input type="text" name="title" 
                   class="w-full border border-gray-300 p-2 rounded @error('title') border-red-500 @enderror" required>
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Upload Gambar</label>
            <input type="file" name="image" 
                   class="w-full border border-gray-300 p-2 rounded @error('image') border-red-500 @enderror" required>
            @error('image')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>

    <!-- Display success message after upload (if any) -->
    @if(session('success'))
        <div class="mt-4 bg-green-500 text-white p-2 rounded">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
