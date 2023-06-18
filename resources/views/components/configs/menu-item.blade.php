@props(['link', 'icon'])

<a href="{{ $link }}" class="flex items-center py-1 hover:text-gray-800">
    <x-icon name="{{ $icon }}" class="inline-flex text-align-bottom w-4 h-4 mr-1" /> 
    <span class="inline-flex mt-1">
        {{ $slot }}
    </span>
</a>