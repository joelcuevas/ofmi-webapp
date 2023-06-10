<x-app-layout>
    <x-slot name="header">
        {{ __('Contests') }}
        <x-icon name="chevron-double-right" class="inline-flex h-4 w-4" />
        {{ __('Info') }}
    </x-slot>

    <x-configs.sections>
        <x-slot name="menu">                
            <x-contests.show-menu contest-id="{{ $contest->id }}" />
        </x-slot>

        <x-slot name="sections">   
            <x-configs.block anchor="details" separator="false">
                <x-action-section>
                    <x-slot name="content">
                        <h1 class="text-xl font-bold mb-4">{{ $contest->title }}</h1>
                        {!! $contest->description_html !!}
                    </x-slot>
                </x-action-section>
            </x-configs.block>
        </x-slot>
    </x-configs.sections>
</x-app-layout>
