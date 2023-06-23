<x-app-layout>
    <x-slot name="header">
        {{ __('Pages') }}
        <x-icon name="chevron-double-right" class="inline-flex h-4 w-4" />
        {{ __('Edit') }}
    </x-slot>

    <x-configs.sections>
        <x-slot name="menu">                
            <x-pages.pages-menu page-id="{{ $page->id }}" />
        </x-slot>

        <x-slot name="sections"> 
            <x-configs.block anchor="edit" separator="false">
                @livewire('pages.edit-page', ['page' => $page])
            </x-configs.block>
        </x-slot>
    </x-configs.sections>
</x-app-layout>
