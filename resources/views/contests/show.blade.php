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
                        <div class="prose max-w-full p-5">
                            <h1 class="text-3xl">{{ $contest->title }}</h1>
                            {!! $contest->description_html !!}
                        </div>
                    </x-slot>
                </x-action-section>
            </x-configs.block>
        </x-slot>
    </x-configs.sections>
</x-app-layout>
