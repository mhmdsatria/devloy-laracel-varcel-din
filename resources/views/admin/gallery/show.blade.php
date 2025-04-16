<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="text-center mb-8">
        <h2 class="text-4xl font-bold text-gray-800">{{ $gallery->title }}</h2>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
    </div>

    <div class="text-center">
        <img src="{{ asset('storage/galleries/' . $gallery->image_path) }}" 
             alt="{{ $gallery->title }}" 
             class="w-full max-h-96 object-cover mb-6 rounded-lg shadow-md">
        <p class="text-gray-600 text-lg">{{ $gallery->description ?? 'Deskripsi tidak tersedia' }}</p>
    </div>

    <!-- Optionally, you can add a back button to return to the gallery list -->
    <div class="mt-6 text-center">
        <a href="{{ route('gallery.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">Kembali ke Galeri</a>
    </div>
</div>
