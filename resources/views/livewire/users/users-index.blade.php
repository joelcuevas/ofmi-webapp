<div>
    <x-content-card>
    <x-table-index>
        <x-slot name="header">
            <x-table-index.th label="Nombre" />
            <x-table-index.th label="Email" />
            <x-table-index.th label="Rol" />
            <x-table-index.th label="" />
        </x-slot>

        <x-slot name="body">
            @forelse ($users as $user)
                <x-table-index.tr>
                    <x-table-index.td active="true">{{ $user->name }} {{ $user->last_name }}</x-table-index.td>
                    <x-table-index.td>{{ $user->email }}</x-table-index.td>
                    <x-table-index.td>{{ __(ucfirst($user->role)) }}</x-table-index.td>
                    <x-table-index.td class="text-right">
                        @if (request()->user()->isSuperadmin())
                            @livewire('users.change-user-role', ['user' => $user], key('change-user-role-'.$user->id))
                        @endif
                    </x-table-index.td>
                </x-table-index.tr>
            @empty
                <x-table-index.tr>
                    <x-table-index.td colspan="4">
                        <x-icon name="face-frown" class="inline align-text-bottom w-4 h-4" /> 
                        Nada por aquí...
                    </x-table-index.td>
                </x-table-index.tr>
            @endforelse
        </x-slot>
    </x-table-index>

    <x-slot name="pagination">
        {{ $users->links() }}
    </x-slot>

    <x-slot name="tooltips">
        <x-tooltip id="tooltip-change-role" label="Cambiar Rol" />
    </x-slot>
</x-content-card>
</div>
