@props(['title', 'description', 'link'])

<a href="{{ $link }}" class="block rounded-xl bg-white p-6 shadow-xl text-left hover:shadow-2xl transition duration-300">
    <h5 class="text-darken mb-3 text-xl font-medium">{{ $title }}</h5>
    <p class="mb-3 font-normal text-gray-500">
        {{ Str::words($description, 15, '...')}}

    </p>
</a>
