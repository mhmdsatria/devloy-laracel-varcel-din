<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gallery->title }} - Dokumentasi</title>
    @vite('resources/css/app.css')
</head>

<body class="h-full bg-gray-100 dark:bg-gray-900">

    <!-- Header dan Navbar -->
    <x-header></x-header>
    <x-navbar>Dokumentasi</x-navbar>

    <!-- Konten Detail Galeri -->
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-10 text-center text-gray-800 dark:text-white">{{ $gallery->title }}</h1>
        
        <div class="rounded-lg overflow-hidden shadow-lg bg-white dark:bg-gray-800">
            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                 alt="{{ $gallery->title }}"
                 class="w-full h-96 object-cover"
                 onerror="this.src='{{ asset('images/placeholder.jpg') }}'">

            <div class="p-5">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $gallery->title }}</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $gallery->description ?? 'Deskripsi belum tersedia' }}</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer></x-footer>

</body>
</html>
