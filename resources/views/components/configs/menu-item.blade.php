@props(['link', 'icon'])

<a href="{{ $link }}" class="flex items-center py-2 hover:text-gray-800">
    <x-icon name="{{ $icon }}" class="inline align-text-bottom w-4 h-4 mr-1" /> 
    <span class="inline-flex">
        {{ $slot }}
    </span>
</a>