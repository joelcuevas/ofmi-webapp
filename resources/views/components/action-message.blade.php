@props(['on', 'error'])

@php
if (isset($error)) {
    $color = 'text-red-600';
} else {
    $color = 'text-green-600';
}
@endphp

<div x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none;"
    {{ $attributes->merge(['class' => $color.' text-sm']) }}>
    {{ $slot->isEmpty() ? 'Saved!' : $slot }}
</div>
