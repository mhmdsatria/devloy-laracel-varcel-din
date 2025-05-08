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

    <div class="bg-[#03954A] place-items-center text-white">
        <div class="bg-[#03954A] p-12 text-white">
            <div class="text-center my-8">
                <h2 class="text-4xl font-bold">BERITA TERKINI</h2>
                <nav class="text-sm text-gray-200 mt-4" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex justify-center items-center space-x-1 sm:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="hover:underline hover:text-white">Home</a>
                            <span class="mx-2 text-gray-300">›</span>
                        </li>
                        <li class="inline-flex items-center">
                            <a href="/berita" class="hover:underline hover:text-white">Berita</a>
                        </li>
                        <li class="inline-flex items-center text-white font-medium">
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <x-layout>
        <div class="max-w-screen-xl mx-auto sm:p-10 md:p-10">
            {{ $informasi->links() }}

            <div class="mt-4 mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($informasi as $post)
                    <a href="/informasi/{{ $post['slug'] }}"
                        class="block bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 hover:scale-105 transition duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}">

                        <div class="p-5">
                            <h2 class="text-xl font-semibold">{{ $post['title'] }}</h2>
                            <p class="font-base text-gray-500">{{ $post['author'] }} |
                                {{ $post->created_at->format('j F Y') }}</p>
                            <p class="text-gray-600 mt-2">{{ Str::words($post['body'], 15, '...') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            {{ $informasi->links() }}
        </div>
    </x-layout>
    <x-footer :stat="$stat" />
</body>

</html>
