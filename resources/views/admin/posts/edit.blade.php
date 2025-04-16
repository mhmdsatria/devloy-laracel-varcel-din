@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Berita</h2>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-md p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-2">Judul</label>
            <input type="text" name="title" class="w-full border rounded px-4 py-2" value="{{ old('title', $post->title) }}" required>
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Slug</label>
            <input type="text" name="slug" class="w-full border rounded px-4 py-2" value="{{ old('slug', $post->slug) }}" required>
            @error('slug') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Penulis</label>
            <input type="text" name="author" class="w-full border rounded px-4 py-2" value="{{ old('author', $post->author) }}" required>
            @error('author') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Isi</label>
            <textarea name="body" class="w-full border rounded px-4 py-2" rows="6" required>{{ old('body', $post->body) }}</textarea>
            @error('body') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Gambar</label>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar" class="w-32 mb-2">
            @endif
            <input type="file" name="image" class="w-full border rounded px-4 py-2">
            @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Update</button>
            <a href="{{ route('admin.posts.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-md">Batal</a>
        </div>
    </form>
</div>
@endsection
