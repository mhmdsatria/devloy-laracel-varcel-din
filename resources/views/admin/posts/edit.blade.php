@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-xl font-semibold border-b pb-2 mb-6">Edit Berita</h2>

    <form 
        action="{{ route('admin.posts.update', $post->id) }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <table class="w-full text-sm">
            <tr class="align-top">
                <td class="w-1/5 py-2 font-semibold">Tanggal</td>
                <td class="py-2">
                    <input type="text" value="{{ $post->created_at->format('d-m-Y') }}" class="w-full border px-2 py-1 bg-gray-100" readonly>
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Judul Berita</td>
                <td class="py-2">
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border px-2 py-1" required>
                    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Penulis</td>
                <td class="py-2">
                    <input type="text" name="author" value="{{ old('author', $post->author) }}" class="w-full border px-2 py-1" required>
                    @error('author') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Isi Berita</td>
                <td class="py-2">
                    <textarea name="body" rows="8" class="w-full border px-2 py-1" required>{{ old('body', $post->body) }}</textarea>
                    @error('body') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Gambar</td>
                <td class="py-2">
                    @if ($post->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="h-32">
                        </div>
                    @endif
                    <input type="file" name="image">
                    @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>
        </table>

        <div class="mt-6 text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
