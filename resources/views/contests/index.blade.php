<x-app-layout>
    <x-slot name="header">
        {{ __('Contests') }}
    </x-slot>

    <x-slot name="toolbar">        
        <x-link-button href="{{ route('contests.create') }}" label="{{ __('Create') }}" />
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
                        </x-table-index.td>
                    </x-table-index.tr>
                @endforeach
            </x-slot>
        </x-table-index>

        <x-slot name="pagination">
            {{ $contests->links() }}
        </x-slot>
    </x-content-card>
</x-app-layout>