@props(['active'])

@php
$classes = ($active ?? false) ? 'text-base font-semibold text-gray-600' : '';
@endphp

<td {!! $attributes->merge(['class' => 'px-6 py-4 '.$classes]) !!}>
    {{ $slot }}
</td>
