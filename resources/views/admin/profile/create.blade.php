@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-4">Tambah Berita Baru</h1>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Judul Berita</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="author">Penulis</label>
                <input type="text" name="author" class="form-control" id="author" value="{{ old('author') }}" required>
            </div>

            <div class="form-group">
                <label for="body">Isi Berita</label>
                <textarea name="body" class="form-control" id="body" rows="5" required>{{ old('body') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Gambar Berita (Optional)</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan Berita</button>
        </form>
    </div>
@endsection
