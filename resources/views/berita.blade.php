<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $post->title }} - Berita</title>
</head>

<body class="h-full">
    
    <!-- Header dan Navbar -->
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>

    <!-- Konten Utama Berita -->
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <figure>
                        <!-- Menampilkan gambar atau gambar default jika tidak ada -->
                        <img src="{{ asset($post->image ?? 'img/default-thumbnail.jpg') }}" alt="{{ $post->title }}">
                    </figure>

                    <address class="flex items-center mt-4 mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('img/puskesmas-seeklogo-3.svg') }}" alt="{{ $post->author }}">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->slug }}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </address>

                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}
                    </h1>
                </header>

                <!-- Deskripsi Berita -->
                <p class="lead">{{ $post->description }}</p>

                <!-- Tombol Aksi: Edit dan Hapus -->
                <div class="mt-5 flex gap-4">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                        Edit
                    </a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                            Hapus
                        </button>
                    </form>
                </div>
            </article>
        </div>
    </main>

    <!-- AlpineJS (Optional, if you use it in the layout) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
