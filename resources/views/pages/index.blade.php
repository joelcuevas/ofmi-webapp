<x-app-layout>
    <x-slot name="header">
        Páginas
    </x-slot>

    <x-slot name="toolbar">   
        @livewire('pages.create-page')     
        <x-search-input submit="{{ route('pages.index') }}" placeholder="Buscar páginas"/>
    </x-slot>

    <x-content-card>
        <x-table-index>
            <x-slot name="header">
                <x-table-index.th label="Título" />
                <x-table-index.th label="Slug (URL)" />
                <x-table-index.th label="" />
            </x-slot>

            <x-slot name="body">
                @forelse ($pages as $page)
                    <x-table-index.tr>
                        <x-table-index.td active="true">{{ $page->title }}</x-table-index.td>
                        <x-table-index.td>{{ $page->slug }}</x-table-index.td>
                        <x-table-index.td class="text-right">
                            <x-button secondary href="{{ route('pages.edit', $page) }}" class="px-[5px] py-[3px]" data-tooltip-target="tooltip-edit">
                                <x-icon name="pencil-square" class="inline-flex text-align-bottom w-4 h-4 px-0" /> 
                            </x-button>
                        </x-table-index.td>
                    </x-table-index.tr>
                @empty
                    <x-table-index.tr>
                        <x-table-index.td colspan="3">
                            <x-icon name="face-frown" class="inline align-text-bottom w-4 h-4" /> 
                            Nada por aquí...
                        </x-table-index.td>
                    </x-table-index.tr>
                @endforelse
            </x-slot>
        </x-table-index>

        <x-slot name="pagination">
            {{ $pages->links() }}
        </x-slot>

        <x-slot name="tooltips">
            <x-tooltip id="tooltip-edit" label="Editar Página" />
        </x-slot>
    </x-content-card>
</x-app-layout>