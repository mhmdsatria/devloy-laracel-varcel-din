@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-5">Edit Galeri</h1>

        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Galeri</label>
                <input type="text" name="title" id="title" value="{{ $gallery->title }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Galeri</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                <p class="text-sm text-gray-500 mt-2">Kosongkan jika tidak ingin mengganti gambar.</p>
                @if ($gallery->image_path)
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="mt-2 w-32 h-32 object-cover">
                @endif
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Update Galeri</button>
        </form>
    </div>
@endsection
