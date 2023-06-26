@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 focus:outline-none transition duration-150 ease-in-out hover:text-indigo-600'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 focus:outline-none transition duration-150 ease-in-out hover:text-indigo-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
