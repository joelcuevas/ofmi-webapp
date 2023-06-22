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
                <x-table-index.th label="{{ __('Contest') }}" />
                <x-table-index.th label="{{ __('Year') }}" />
                <x-table-index.th label="{{ __('Active') }}" />
                <x-table-index.th label="{{ __('Status') }}" />
                <x-table-index.th label="" />
            </x-slot>

            <x-slot name="body">
                @foreach ($contests as $contest)
                    <x-table-index.tr>
                        <x-table-index.td active="true">{{ $contest->title }}</x-table-index.td>
                        <x-table-index.td>{{ $contest->year }}</x-table-index.td>
                        <x-table-index.td>
                            @if ($contest->active)
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-1 inline-block"></div> {{ __('Active') }}
                            @else
                                <div class="h-2.5 w-2.5 rounded-full bg-gray-200 mr-1 inline-block"></div> <span class="text-gray-300">{{ __('Inactive') }}</span>
                            @endif
                        </x-table-index.td>
                        <x-table-index.td>{{ __(ucfirst($contest->status)) }}</x-table-index.td>
                        <x-table-index.td class="text-right">
                            <x-button secondary href="{{ route('contests.show', $contest) }}" class="px-[5px] py-[3px]" data-tooltip-target="tooltip-config">
                                <x-icon name="cog-6-tooth" class="inline-flex text-align-bottom w-4 h-4 px-0" /> 
                            </x-button>
                        </x-table-index.td>
                    </x-table-index.tr>
                @endforeach
            </x-slot>
        </x-table-index>

        <x-slot name="pagination">
            {{ $contests->links() }}
        </x-slot>

        <x-slot name="tooltips">
            <x-tooltip id="tooltip-config" label="{{ __('Contest Config') }}" />
        </x-slot>
    </x-content-card>
</x-app-layout>