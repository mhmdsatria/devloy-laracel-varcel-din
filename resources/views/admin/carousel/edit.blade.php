@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Gambar Carousel</h1>

    <form method="POST" action="{{ route('admin.carousel.update', $carousel) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block">Gambar Saat Ini</label>
            <img src="{{ asset('storage/' . $carousel->image) }}" class="w-64 h-40 object-cover mb-2">
        </div>

        <div class="mb-4">
            <label class="block">Ganti Gambar (opsional)</label>
            <input type="file" name="image" class="border rounded p-2 w-full">
            @error('image') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
