@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-xl font-semibold border-b pb-2 mb-6">
        {{ isset($pelayanan) ? 'Edit Pelayanan' : 'Form Input Pelayanan' }}
    </h2>

    <form action="{{ isset($pelayanan) ? route('admin.pelayanans.update', $pelayanan->id) : route('admin.pelayanans.store') }}" method="POST">
        @csrf
        @if(isset($pelayanan)) @method('PUT') @endif

        <table class="w-full text-sm">
            <tr class="align-top">
                <td class="w-1/5 py-2 font-semibold">Judul</td>
                <td class="py-2">
                    <input type="text" name="title" class="w-full border px-2 py-1" value="{{ old('title', $pelayanan->title ?? '') }}" required>
                    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Deskripsi</td>
                <td class="py-2">
                    <textarea name="description" rows="5" class="w-full border px-2 py-1" required>{{ old('description', $pelayanan->description ?? '') }}</textarea>
                    @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr class="align-top">
                <td class="py-2 font-semibold">Hari</td>
                <td class="py-2">
                    <input type="text" name="days" class="w-full border px-2 py-1" value="{{ old('days', $pelayanan->days ?? '') }}" required>
                    @error('days') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </td>
            </tr>
        </table>

        <div class="mt-6 text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                {{ isset($pelayanan) ? 'Update' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.pelayanans.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
