<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <x-slot name="toolbar">
        <!-- Search -->
        <x-search-input submit="{{ route('users.index') }}" placeholder="{{ __('Search for users') }}"/>
    </x-slot>

    @livewire('users.users-index', ['q' => request()->q])
</x-app-layout>