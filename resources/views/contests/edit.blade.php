<x-app-layout>
    <x-slot name="header">
        {{ __('Contests') }}
        <x-icon name="chevron-double-right" class="inline-flex h-4 w-4" />
        {{ __('Edit') }}
    </x-slot>

    <x-configs.sections>
        <x-slot name="menu">                
            <x-contests.show-menu contest-id="{{ $contest->id }}" />
        </x-slot>

        <x-slot name="sections">   
            <x-configs.block anchor="activate">
                @livewire('contests.activate-contest', ['contest' => $contest])
            </x-configs.block>

            <x-configs.block anchor="update" separator="false">
                @livewire('contests.update-contest-information', ['contest' => $contest])
            </x-configs.block>
        </x-slot>
    </x-configs.sections>
</x-app-layout>
