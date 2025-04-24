@extends('layouts.app')

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Carousel</h1>
        <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary">+ Tambah Gambar</a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($carousels as $carousel)
            <div class="border p-2 rounded shadow">
                <img src="{{ asset('storage/' . $carousel->image) }}" class="w-full h-48 object-cover rounded" alt="Carousel">
                <div class="mt-2 flex justify-between">
                    <a href="{{ route('admin.carousel.edit', $carousel) }}" class="text-blue-600">Edit</a>
                    <form method="POST" action="{{ route('admin.carousel.destroy', $carousel) }}" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
