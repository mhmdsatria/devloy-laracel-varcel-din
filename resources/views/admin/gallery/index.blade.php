@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <a href="{{ route('gallery.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Gambar</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
        @foreach($galleries as $gallery)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                     alt="{{ $gallery->title }}" 
                     class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-medium">{{ $gallery->title }}</h2>

                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-4 py-2 rounded w-full"
                                onclick="return confirm('Yakin hapus gambar ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $galleries->links('pagination::tailwind') }}
    </div>
</div>
@endsection
