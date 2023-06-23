@props(['link', 'icon', 'external'])

@php
$target = '';

if (isset($external)) {
    $target = '_blank';
}
@endphp

<a href="{{ $link }}" target="{{ $target }}" class="flex items-center py-2 hover:text-gray-800">
    <x-icon name="{{ $icon }}" class="inline align-text-bottom w-4 h-4 mr-1" /> 
    <span class="inline-flex">
        {{ $slot }}
    </span>
</a>