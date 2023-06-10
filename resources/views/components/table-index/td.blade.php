@props(['active'])

@php
$classes = ($active ?? false) ? 'text-base font-semibold text-gray-600' : '';
@endphp

<td class="px-6 py-4">
    <div {{ $attributes->merge(['class' => $classes]) }} class="text-base font-semibold text-gray-600">
        {{ $slot }}
    </div>
</td>