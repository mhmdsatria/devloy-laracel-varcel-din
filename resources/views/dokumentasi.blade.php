<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-10 text-center text-gray-800 dark:text-white">Dokumentasi Galeri</h1>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($galleries as $gallery)
                <div class="rounded-lg overflow-hidden shadow-lg bg-white dark:bg-gray-800">
                    <img src="{{ asset('storage/galleries/' . $gallery->image_path) }}"
                         alt="{{ $gallery->title }}"
                         class="w-full h-96 object-cover"
                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'"> <!-- Fallback image -->

                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $gallery->title }}</h3>
                        @if ($gallery->description)
                            <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $galleries->links('pagination::tailwind') }} <!-- Tailwind pagination -->
        </div>
    </div>

</body>
</html>
