<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Detail Pelayanan</title>
</head>

<body class="bg-gray-50 text-gray-800">
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>
    <div class="bg-[#03954A] p-12 text-white">
        <div class="text-center my-8">
            <h2 class="text-4xl font-bold">{{ $pelayanan->title }}</h2>

            <nav class="text-sm text-gray-200 mt-4" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex justify-center items-center space-x-1 sm:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:underline hover:text-white">Home</a>
                        <span class="mx-2 text-gray-300">›</span>
                    </li>
                    <li class="inline-flex items-center">
                        <a href="/layanan" class="hover:underline hover:text-white">Layanan Kami</a>
                        <span class="mx-2 text-gray-300">›</span>
                    </li>
                    <li class="inline-flex items-center text-white font-medium">
                        {{ $pelayanan->title }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <x-layout>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{-- Judul Utama --}}
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">{{ $pelayanan->title }}</h1>
            {{-- Hari Layanan --}}
            <div class="text-sm text-gray-600 mb-4">
                <strong>Hari Layanan:</strong> {{ $pelayanan->days }}
            </div>

            {{-- Detail Layanan --}}
            @if ($details->count())
                <div class="grid gap-6 mt-4">
                    @foreach ($details as $detail)
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
                            <p class="text-gray-700">{{ $detail->detail }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- Metadata Layanan --}}
            {{--  <div class="flex flex-wrap items-center text-sm text-gray-500 gap-x-6 mb-6">
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 3a2 2 0 00-2 2v12a1 1 0 001.6.8L10 14l6.4 3.8A1 1 0 0018 17V5a2 2 0 00-2-2H4z" />
                    </svg>
                    <span>1162 Halaman Dilihat</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75" />
                    </svg>
                    <span>Klaster Pelayanan Ibu Dan Anak</span>
                </div>
            </div>
      --}}
            {{-- Informasi Utama --}}
            <div
                class="bg-white rounded-xl shadow-md p-6 md:p-8 border border-gray-200 leading-relaxed text-gray-700 space-y-4">
                <p>{!! nl2br(e($pelayanan->description)) !!}</p>
            </div>



            {{-- Detail Tambahan --}}
            @if ($details->count())
                <div class="grid gap-6 mt-8">
                    @foreach ($details as $detail)
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">

                            <p class="text-gray-700">{{ $detail->detail }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Tombol Kembali --}}
            <div class="mt-10 ">
                <a href="{{ url('/layanan') }}"
                    class="inline-block text-indigo-600 hover:text-indigo-800 font-medium transition-all duration-200">
                    &larr; Kembali ke Daftar Pelayanan
                </a>
            </div>
        </div>
    </x-layout>


    <x-footer :stat="$stat" />
</body>

</html>
