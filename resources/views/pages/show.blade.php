<x-app-layout>
    <x-slot name="header">
        Páginas
        <x-icon name="chevron-double-right" class="inline-flex h-4 w-4" />
        Vista Previa
    </x-slot>

    <x-configs.sections>
        <x-slot name="menu">                
            <x-pages.pages-menu page-id="{{ $page->id }}" />
        </x-slot>

        <x-slot name="sections">   
            <x-configs.block anchor="preview" separator="false">
                <x-action-section>
                    <x-slot name="content">
                        <div class="prose max-w-full p-5">
                            <h1 class="text-3xl">{{ $page->title }}</h1>
                            {!! $page->content_html !!}
                        </div>
                    </x-slot>
                </x-action-section>
            </x-configs.block>
        </x-slot>
    </x-configs.sections>
</x-app-layout>
