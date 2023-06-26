<x-action-section submit="update">
    <x-slot name="title">
        Activar Concurso
    </x-slot>

    <x-slot name="description">
        Un concurso activo se muestra como tal en el website (solo un concurso puede estar activo a la vez).
    </x-slot>

    <x-slot name="content">
        @if (! $contest->active)
            <h3 class="text-lg font-medium text-gray-900">
                <div class="h-2.5 w-2.5 rounded-full bg-gray-400 mr-2 inline-block"></div>
                Este concurso está inactivo.
            </h3>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    Al activar este concurso se publicará y mostrará en el sitio web. Todos los demás concursos serán desactivados.
                </p>
            </div>
            <div class="flex items-center mt-5">
                <x-button wire:click="$set('confirmingActivation', true)" wire:loading.attr="disabled">
                    Activar
                </x-button>
            </div>
        @else
            <h3 class="text-lg font-medium text-gray-900">
                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2 inline-block"></div>
                Este concurso está activo.
            </h3>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    Para desactivar el concurso, debes activar algún otro.
                </p>
            </div>
        @endif

        <x-dialog-modal wire:model="confirmingActivation">
            <x-slot name="title">
                Activar Concurso
            </x-slot>

            <x-slot name="content">
                <div class="text-red-700">
                    <p class="mb-4">Al activar este concurso se publicará y mostrará en el sitio web. Todos los demás concursos serán desactivados.</p>
                    <p class="font-bold">¿Confirmas que lo deseas activar?</p>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingActivation')" wire:loading.attr="disabled">
                    Cancelar
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="activate" wire:loading.attr="disabled">
                    Sí, activarlo
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>