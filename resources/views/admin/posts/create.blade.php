@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Tambah Berita Baru</h2>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-md p-6">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-2">Judul</label>
            <input type="text" name="title" class="w-full border rounded px-4 py-2" value="{{ old('title') }}" required>
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Slug</label>
            <input type="text" name="slug" class="w-full border rounded px-4 py-2" value="{{ old('slug') }}" required>
            @error('slug') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Penulis</label>
            <input type="text" name="author" class="w-full border rounded px-4 py-2" value="{{ old('author') }}" required>
            @error('author') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Isi</label>
            <textarea name="body" rows="6" class="w-full border rounded px-4 py-2" required>{{ old('body') }}</textarea>
            @error('body') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Gambar</label>
            <input type="file" name="image" class="w-full border rounded px-4 py-2">
            @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Simpan</button>
            <a href="{{ route('admin.posts.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-md">Batal</a>
        </div>
    </form>
</div>
@endsection
