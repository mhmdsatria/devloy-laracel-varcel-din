<!-- components/carousel.blade.php -->
<div x-data="{ activeIndex: 0, slides: {{ count($items) }} }"
     x-init="setInterval(() => activeIndex = (activeIndex + 1) % slides, 4000)"
     class="relative w-full">

    <div class="relative h-56 overflow-hidden rounded-lg md:h-120">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>

        @foreach ($items as $index => $item)
            <div class="absolute w-full h-full transition-all duration-1000 ease-in-out"
                x-bind:class="{
                    'opacity-100 z-20': activeIndex === {{ $index }},
                    'opacity-0 z-10': activeIndex !== {{ $index }}
                }">
                <img src="{{ asset('storage/' . $item->image) }}"
                     class="block w-full h-full object-cover"
                     alt="Slide {{ $index + 1 }}">
            </div>
        @endforeach
    </div>
</div>
