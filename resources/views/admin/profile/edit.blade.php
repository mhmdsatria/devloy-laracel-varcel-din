@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Post</h1>
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label for="author">Penulis</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}" required>
            </div>

            <div class="form-group">
                <label for="body">Konten</label>
                <textarea class="form-control" id="body" name="body" rows="5" required>{{ $post->body }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($post->image)
                    <p>Gambar saat ini: <img src="{{ asset('storage/images/'.$post->image) }}" alt="Image" class="mt-2" style="width: 150px;"></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
        </form>
    </div>
@endsection
