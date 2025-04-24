@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Header & Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Berita</h1>
            <a href="{{ route('admin.posts.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md shadow">
                + Tambah Berita
            </a>
        </div>

        <!-- Notifikasi sukses -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border text-left">No</th>
                        <th class="px-4 py-3 border text-left">Judul</th>
                        <th class="px-4 py-3 border text-left">Penulis</th>
                        <th class="px-4 py-3 border text-left">Tanggal</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($posts as $key => $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $post->title }}</td>
                            <td class="px-4 py-2 border">{{ $post->author }}</td>
                            <td class="px-4 py-2 border">{{ $post->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Belum ada berita yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
