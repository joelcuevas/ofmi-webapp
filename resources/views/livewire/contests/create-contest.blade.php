<div>
    <x-button wire:click="$set('creating', true)">Crear Concurso</x-button>

    <x-modal wire:model="creating">
        <x-form-section submit="create">
            <x-slot name="title">
                Crear Concurso
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-1">
                    <x-label for="year" value="Año" />
                    <x-input id="year" name="year" type="text" class="mt-1 block w-full" wire:model.defer="year" />
                    <x-input-error for="year" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-5">
                    <x-label for="title" value="Título" />
                    <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model.defer="title" />
                    <x-input-error for="title" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-secondary-button wire:click="$toggle('creating')" wire:loading.attr="disabled">
                    Cancelar
                </x-secondary-button>

                <x-button class="ml-2">
                    Crear
                </x-button>
            </x-slot>
        </x-form-section>
    </x-modal>
</div>