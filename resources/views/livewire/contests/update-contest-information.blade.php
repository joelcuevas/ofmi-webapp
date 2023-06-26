<x-form-section submit="update">
    <x-slot name="title">
        Editar Información
    </x-slot>

    <x-slot name="description">
        Edita la información de tu concurso. El año debe de ser único, y la descripción puede usar Markdown y HTML.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-1">
            <x-label for="year" value="Año" />
            <x-input id="year" name="year" type="text" class="mt-1 block w-full" wire:model="year" />
            <x-input-error for="year" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-5">
            <x-label for="title" value="Título" />
            <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model="title" />
            <x-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-label for="description" value="Descripción" />
            <x-inputs.textarea id="description" name="description" rows="20" class="mt-1 block w-full" wire:model="description"></x-inputs.textarea>
            <x-input-error for="description" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            ¡Guardado!
        </x-action-message>

        <x-button>
            Guardar
        </x-button>
    </x-slot>
</x-form-section>