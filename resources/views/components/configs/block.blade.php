@props(['anchor', 'separator'])

@php
$separator = isset($separator) ? ! $separator == "false" : true;
@endphp

@if (isset($anchor))
    <a name="{{ $anchor }}"></a>
@endif

<div class="mt-10 sm:mt-0">
    {{ $slot }}
</div>

@if ($separator)
    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
@endif