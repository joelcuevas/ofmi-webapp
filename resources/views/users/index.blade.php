<x-app-layout>
    <x-slot name="header">
        Usuarios
    </x-slot>

    <x-slot name="toolbar">
        <!-- Search -->
        <x-search-input submit="{{ route('users.index') }}" placeholder="Buscar usuarios"/>
    </x-slot>

    @livewire('users.users-index', ['q' => request()->q])
</x-app-layout>