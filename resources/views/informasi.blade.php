<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Berita</title>
</head>

<body>
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>

    <div class="bg-[#03954A] p-18 place-items-center text-white">
        <div class="text-center my-8">
            <h2 class="text-4xl font-bold">BERITA TERKINI</h2>
            <p></p>
        </div>
    </div>
    <x-layout>
        <div class="max-w-screen-xl mx-auto sm:p-10 md:p-10">
            {{--  <div class="text-center my-6">
                <h2 class="text-4xl font-bold text-gray-800">BERITA TERKINI</h2>
            </div>  --}}
            {{ $informasi->links() }}

            <div class="mt-4 mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($informasi as $post)
                    <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}">

                        <div class="p-5">
                            <a href="/informasi/{{ $post['slug'] }}" class="hover:underline">
                                <h2 class="text-xl font-semibold">{{ $post['title'] }}</h2>
                            </a>
                            <p class="font-base text-gray-500">{{ $post['author'] }} |
                                {{ $post->created_at->format('j F Y') }}</p>
                            <p class="text-gray-600 mt-2">{{ Str::words($post['body'], 15, '...') }}</p>
                            {{--  <a href="{{ route('informasi.show', ['id' => $post['id']]) }}">Baca Selengkapnya</a>  --}}
                            <a href="/informasi/{{ $post['slug'] }}"
                                class="inline-block mt-4 text-indigo-600 hover:underline">Lanjut
                                Selengkapnya &raquo;</a>
                        </div>
                    </article>
                @endforeach
            </div>
            {{ $informasi->links() }}
        </div>
    </x-layout>
    <x-footer></x-footer>
</body>

</html>
