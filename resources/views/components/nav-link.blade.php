@props(['active'])

@php
$classes = ($active ?? false)
? 'bg-gray-800 text-white border-0 px-3 py-2 rounded-md text-sm font-medium'
: 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>