@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-800 rounded-md px-3 py-2 text-m font-medium'
            : 'text-gray-800 hover:text-blue-500 rounded-md px-3 py-2 text-m font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
