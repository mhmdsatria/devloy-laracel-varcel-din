@props(['title', 'description', 'link'])

<div class="rounded-xl bg-white p-6 shadow-xl text-left">
    <a href="{{ $link }}">
        <h5 class="text-darken mb-3 text-xl font-medium px-4">{{ $title }}</h5>
    </a>
    <p class="mb-3 font-normal px-4 text-gray-500">
        {{ Str::words($description, 15, '...') }}
    </p>
    <a href="{{ $link }}" class="inline-block mt-2 text-indigo-600 hover:underline px-4">
        Lanjut Selengkapnya &raquo;
    </a>
</div>
