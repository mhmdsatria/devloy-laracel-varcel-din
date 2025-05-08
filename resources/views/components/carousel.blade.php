<div x-data="{ activeIndex: 0, slides: {{ count($items) }} }" x-init="setInterval(() => activeIndex = (activeIndex + 1) % slides, 4000)" class="relative w-full">

    <div x-data="{ active: 0 }" x-init="setInterval(() => active = (active + 1) % {{ count($items) }}, 4000)" class="relative w-full">

        <div class="relative w-full overflow-hidden">
            <div class="flex transition-all duration-500 ease-in-out">
                @foreach ($items as $index => $item)
                    <div class="w-full flex-shrink-0" x-show="active === {{ $index }}" x-transition>
                        <img src="{{ asset('carousel/' . $item->gambar) }}" alt="Carousel {{ $index + 1 }}" class="w-full h-64 object-cover">
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
