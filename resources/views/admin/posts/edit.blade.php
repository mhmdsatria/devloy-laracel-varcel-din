@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-xl font-semibold border-b pb-2 mb-6">Form Input Berita</h2>

    <form 
        action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf
        @if(isset($post)) @method('PUT') @endif

        <table class="w-full text-sm">
            <tr class="align-top">
                <td class="w-1/5 py-2 font-semibold">Tanggal</td>
                <td class="py-2">
                    <input type="text" value="{{ now()->format('d-m-Y') }}" class="w-full border px-2 py-1 bg-gray-100" readonly>
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Judul Berita</td>
                <td class="py-2">
                    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="w-full border px-2 py-1" required>
                    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Isi Berita</td>
                <td class="py-2">
                    <textarea name="body" rows="8" class="w-full border px-2 py-1">{{ old('body', $post->body ?? '') }}</textarea>
                    @error('body') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Gambar</td>
                <td class="py-2">
                    @if(isset($post) && $post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-24 mb-2" alt="gambar">
                    @endif
                    <input type="file" name="image">
                    @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>
        </table>

        <div class="mt-6 text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">Save</button>
        </div>
    </form>
</div>
@endsection
