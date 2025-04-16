<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10); // Menampilkan 10 post terbaru
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'author' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses penyimpanan gambar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public'); // Menyimpan gambar di public/images

            // Menambahkan gambar ke dalam gallery
            Gallery::create([
                'title' => $validated['title'],  // Sama dengan title post
                'image_path' => $validated['image'], // Gambar yang di-upload
            ]);
        }

        // Menyimpan data post baru
        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Validasi inputan
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data post
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->author = $request->author;
        $post->body = $request->body;

        // Jika ada gambar baru
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada
            if ($post->image && file_exists(storage_path('app/public/' . $post->image))) {
                unlink(storage_path('app/public/' . $post->image));
            }

            // Menyimpan gambar baru
            $post->image = $request->file('image')->store('images', 'public');
        }

        // Simpan perubahan post
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        // Periksa dan hapus gambar dari penyimpanan jika ada
        if ($post->image && file_exists(storage_path('app/public/images/' . $post->image))) {
            unlink(storage_path('app/public/images/' . $post->image));
        }
        
        // Hapus post
        $post->delete();

        // Hapus entri di gallery terkait dengan post ini
        Gallery::where('title', $post->title)->delete(); // Menghapus gambar terkait di gallery

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
