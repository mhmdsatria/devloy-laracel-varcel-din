@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Pelayanan</h1>
            <a href="{{ route('admin.pelayanans.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md shadow">
                + Tambahkan Layanan
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border text-left">No</th>
                        <th class="px-4 py-3 border text-left">Nama Pelayanan</th>
                        <th class="px-4 py-3 border text-left">Deskripsi</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($pelayanans as $key => $data)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $data->title }}</td>
                            <td class="px-4 py-2 border">
                                {{ strlen(strip_tags($data->description)) > 60 ? substr(strip_tags($data->description), 0, 60) . '...' : strip_tags($data->description) }}
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.pelayanans.edit', $data->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.pelayanans.destroy', $data->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
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
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                Belum ada layanan yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
