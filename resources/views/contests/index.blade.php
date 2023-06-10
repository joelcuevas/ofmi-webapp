<x-app-layout>
    <x-slot name="header">
        {{ __('Contests') }}
    </x-slot>

    <x-slot name="toolbar">        
        @livewire('contests.create-contest')
        <x-search-input submit="{{ route('contests.index') }}" placeholder="{{ __('Search for contests') }}"/>
    </x-slot>

    <x-content-card>
        <x-table-index>
            <x-slot name="header">
                <x-table-index.th label="{{ __('Year') }}" />
                <x-table-index.th label="{{ __('Contest') }}" />
                <x-table-index.th label="{{ __('Status') }}" />
                <x-table-index.th label="" />
            </x-slot>

            <x-slot name="body">
                @foreach ($contests as $contest)
                    <x-table-index.tr>
                        <x-table-index.td>{{ $contest->year }}</x-table-index.td>
                        <x-table-index.td active="true">{{ $contest->title }}</x-table-index.td>
                        <x-table-index.td>{{ __(ucfirst($contest->status)) }}</x-table-index.td>
                        <x-table-index.td class="text-right">
                            <a href="{{ route('contests.show', $contest) }}" class="font-medium text-indigo-600" data-tooltip-target="tooltip-edit">
                                <x-icon name="pencil-square" class="inline w-6 h-6"/>
                            </a>
                        </x-table-index.td>
                    </x-table-index.tr>
                @endforeach
            </x-slot>
        </x-table-index>

        <x-slot name="pagination">
            {{ $contests->links() }}
        </x-slot>

        <x-slot name="tooltips">
            <x-tooltip id="tooltip-edit" label="{{ __('Edit') }}" />
        </x-slot>
    </x-content-card>
</x-app-layout>