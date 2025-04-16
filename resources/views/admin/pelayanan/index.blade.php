@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-5">Daftar Pelayanan</h1>

        <a href="{{ route('admin.pelayanans.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">+ Tambahkan Layanan</a>

        <div class="overflow-x-auto mt-5 bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">No</th>
                        <th class="border px-4 py-2 text-left">Nama Pelayanan</th>
                        <th class="border px-4 py-2 text-left">Deskripsi</th>
                        <th class="border px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelayanans as $key => $data)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $key + 1 }}</td>
                        <td class="border px-4 py-2">{{ $data->title }}</td>
                        <td class="border px-4 py-2">
                            {{ strlen($data->description) > 50 ? substr($data->description, 0, 50) . '...' : $data->description }}
                        </td>
                        <td class="border px-4 py-2 text-center flex justify-center gap-2">
                            <a href="{{ route('admin.pelayanans.edit', $data->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md">Edit</a>
                            <form action="{{ route('admin.pelayanans.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
