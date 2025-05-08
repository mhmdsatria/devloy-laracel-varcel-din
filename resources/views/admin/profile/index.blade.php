@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h2 class="text-2xl font-bold mb-6">Profil Puskesmas</h2>

    @if ($profile)
        <table class="table-lg w-full border border-gray-300">
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2 font-semibold w-1/3">Nama</td>
                    <td class="px-4 py-2 border-gray-300">{{ $profile->nama_puskesmas }}</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 font-semibold">Email</td>
                    <td class="px-4 py-2">{{ $profile->email }}</td>
                </tr>
                @if ($profile->struktur_organisasi)
                <tr class="border border-gray-300">
                    <td class="px-4 py-2 font-semibold">Struktur Organisasi</td>
                    <td class="px-4 py-2">
                        <img src="{{ asset('storage/' . $profile->struktur_organisasi) }}"
                             alt="Struktur Organisasi" class="w-32 h-auto">
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('admin.profile.edit', $profile->id) }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
               Edit Profil
            </a>
        </div>
    @else
        <p class="text-gray-600 mb-4">Belum ada data profil puskesmas.</p>
        <a href="{{ route('admin.profile.create') }}"
           class="inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">
           Tambahkan Profil
        </a>
    @endif
</div>
@endsection
