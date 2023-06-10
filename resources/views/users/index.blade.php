<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <x-slot name="toolbar">
        <!-- Search -->
        <x-search-input submit="{{ route('users.index') }}" placeholder="{{ __('Search for users') }}"/>
    </x-slot>

    <x-content-card>
        <x-table-index>
            <x-slot name="header">
                <x-table-index.th label="{{ __('Name') }}" />
                <x-table-index.th label="{{ __('Email') }}" />
                <x-table-index.th label="{{ __('Role') }}" />
                <x-table-index.th label="" />
            </x-slot>

            <x-slot name="body">
                @foreach ($users as $user)
                    <x-table-index.tr>
                        <x-table-index.td active="true">{{ $user->name }} {{ $user->last_name }}</x-table-index.td>
                        <x-table-index.td>{{ $user->email }}</x-table-index.td>
                        <x-table-index.td>{{ __(ucfirst($user->role)) }}</x-table-index.td>

                        <x-table-index.td class="text-right">
                            @if (request()->user()->isSuperadmin())
                                @if ($user->hasRole('admin'))
                                    <a href="{{ route('users.make-contestant', $user) }}" class="font-medium text-indigo-600" data-tooltip-target="tooltip-make-contestant">
                                        <x-icon name="minus-circle" class="inline w-6 h-6"/>
                                    </a>
                                @elseif ($user->hasRole('contestant'))
                                    <a href="{{ route('users.make-admin', $user) }}" class="font-medium text-indigo-600" data-tooltip-target="tooltip-make-admin">
                                        <x-icon name="plus-circle" class="inline w-6 h-6"/>
                                    </a>
                                @else   
                                    <span class="font-medium text-gray-300">
                                        <x-icon name="minus-circle" class="inline w-6 h-6"/>
                                    </span>
                                @endif
                            @endif
                        </x-table-index.td>
                    </x-table-index.tr>
                @endforeach
            </x-slot>
        </x-table-index>

        <x-slot name="pagination">
            {{ $users->links() }}
        </x-slot>

        <x-slot name="tooltips">
            <x-tooltip id="tooltip-make-admin" label="{{ __('Make admin') }}" />
            <x-tooltip id="tooltip-make-contestant" label="{{ __('Make contestant') }}" />
        </x-slot>
    </x-content-card>
</x-app-layout>