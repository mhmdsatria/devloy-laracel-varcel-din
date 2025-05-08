<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $post->title }} - Berita</title>
</head>

<body>
    <!-- Header dan Navbar -->
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>
    
    <!-- Konten Utama -->
    <x-layout>
        <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
            <!-- component -->
            <div class="max-w-screen-lg mx-auto">
                <!-- header -->
                <main class="mt-10">

                    <div class="mb-4 md:mb-0 w-full mx-auto relative">
                        <div class="px-4 lg:px-0">
                            <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                                {{ $post->title }}
                            </h2>
                            <a href="#" class="py-2 text-green-700 inline-flex items-center justify-center mb-2">
                                Author : {{ $post->author }} |
                                {{ $post->created_at->format('j F Y') }}
                            </a>
                        </div>

                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full object-cover lg:rounded"
                            style="height: 28em;" />
                    </div>

                    <div class="flex flex-col lg:flex-row lg:space-x-12">

                        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
                            <p class="pb-6">{{ $post->body }}</p>
                        </div>
                    </div>
                </main>
                <!-- main ends here -->
            </div>
            {{--  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Gambar Berita -->
                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->title }}">
                    <div class="p-5">
                        <!-- Judul dan Info Berita -->
                        <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                        <p class="font-base text-gray-500">{{ $post->author }} |
                            {{ $post->created_at->format('j F Y') }}</p>
                        <p class="text-gray-600 mt-2">{{ Str::limit($post->body, 150) }}</p>
                        <a href="/informasi" class="inline-block mt-4 text-indigo-600 hover:underline">&laquo;
                            Kembali</a>
                    </div>
                </article>
            </div>  --}}
        </div>
    </x-layout>
    <x-footer :stat="$stat" />
</body>

</html>
