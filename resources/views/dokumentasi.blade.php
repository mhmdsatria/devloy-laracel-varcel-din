<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dokumentasi</title>
    <style>
        .slide-enter {
            opacity: 0;
            transform: translateX(50%);
        }
        .slide-leave {
            opacity: 0;
            transform: translateX(-50%);
        }
        .slide-active {
            opacity: 1;
            transform: translateX(0);
            transition: all 0.5s ease;
        }
    </style>
</head>
<body>
    <x-header></x-header>
    <x-navbar>Puskesmas</x-navbar>
    <div class="bg-[#03954A] place-items-center text-white">
        <div class="bg-[#03954A] p-12 text-white">
            <div class="text-center my-8">
                <h2 class="text-4xl font-bold">DOKUMENTASI</h2>
                <nav class="text-sm text-gray-200 mt-4" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex justify-center items-center space-x-1 sm:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="hover:underline hover:text-white">Home</a>
                            <span class="mx-2 text-gray-300">›</span>
                        </li>
                        <li class="inline-flex items-center">
                            <a href="/dokumentasi" class="hover:underline hover:text-white">Dokumentasi</a>
                        </li>
                        <li class="inline-flex items-center text-white font-medium">
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header Judul -->
    {{--  <div class="bg-[#03954A] p-18 place-items-center text-white">
        <div class="text-center my-8">
            <h2 class="text-4xl font-bold">DOKUMENTASI</h2>
        </div>
    </div>  --}}

    <!-- Konten Galeri -->
    <x-layout>
        <div class="max-w-screen-xl mx-auto sm:p-10 md:p-8">

            <div x-data="{
                open: false,
                images: @js($galleries->pluck('image_path')),
                titles: @js($galleries->pluck('title')),
                index: 0,
                direction: 1,
                get imageSrc() {
                    return '/storage/' + this.images[this.index];
                },
                get imageTitle() {
                    return this.titles[this.index];
                },
                next() {
                    this.direction = 1;
                    if (this.index < this.images.length - 1) this.index++;
                    else this.index = 0;
                },
                prev() {
                    this.direction = -1;
                    if (this.index > 0) this.index--;
                    else this.index = this.images.length - 1;
                },
                openModal(i) {
                    this.index = i;
                    this.open = true;
                }
            }"
            @keydown.window="
                if (open) {
                    if ($event.key === 'ArrowRight') next();
                    if ($event.key === 'ArrowLeft') prev();
                    if ($event.key === 'Escape') open = false;
                }
            ">

                <!-- Grid Galeri -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($galleries as $i => $gallery)
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <img 
                                src="{{ asset('storage/' . $gallery->image_path) }}"
                                alt="{{ $gallery->title }}"
                                class="w-full h-72 object-cover rounded-lg mb-4 cursor-pointer"
                                @click="openModal({{ $i }})"
                                onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $gallery->title }}</h3>
                        </div>
                    @endforeach
                </div>

                <!-- Modal Lightbox -->
                <div x-show="open"
                     class="fixed inset-0 flex items-center justify-center bg-black/60 backdrop-blur-md z-50"
                     x-transition
                     @keydown.escape.window="open = false"
                     @click.self="open = false">

                    <div class="relative max-w-3xl w-full px-4 text-center">

                        <!-- Gambar -->
                        <div :key="index" 
                             x-transition:enter="slide-enter"
                             x-transition:enter-end="slide-active"
                             x-transition:leave="slide-leave"
                             x-transition:leave-end="slide-active">
                            <img :src="imageSrc" :alt="imageTitle" class="rounded-lg max-h-[80vh] mx-auto">
                            <h2 class="text-white text-lg mt-2 font-semibold" x-text="imageTitle"></h2>
                        </div>

                        <!-- Tombol Navigasi -->
                        <button @click="prev" 
                                class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white text-3xl px-3 py-1 hover:text-gray-400">
                            &#8592;
                        </button>
                        <button @click="next"
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white text-3xl px-3 py-1 hover:text-gray-400">
                            &#8594;
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $galleries->links('pagination::tailwind') }}
            </div>
        </div>
    </x-layout>

    <x-footer :stat="$stat" />

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
