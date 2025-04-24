@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-xl font-semibold border-b pb-2 mb-6">Form Tambah Carousel</h2>

    <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <table class="w-full text-sm">
            <tr class="align-top">
                <td class="w-1/5 py-2 font-semibold">Judul</td>
                <td class="py-2">
                    <input type="text" name="title" class="w-full border px-2 py-1" value="{{ old('title') }}" required>
                    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>
            <tr class="align-top">
                <td class="py-2 font-semibold">Gambar</td>
                <td class="py-2">
                    <input type="file" name="image" class="border px-2 py-1" required>
                    @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>
        </table>

        <div class="mt-6 text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.carousel.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
