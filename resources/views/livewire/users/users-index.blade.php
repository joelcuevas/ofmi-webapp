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
                            @livewire('users.change-user-role', ['user' => $user])
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
        <x-tooltip id="tooltip-change-role" label="{{ __('Change Role') }}" />
    </x-slot>
</x-content-card>
