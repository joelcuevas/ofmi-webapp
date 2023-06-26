<x-form-section submit="update">
    <x-slot name="title">
        Editar Página
    </x-slot>

    <x-slot name="description">
        Edita el contenido de tu página. El slug debe ser apto para URL y único, y el contenido puede usar Markdown y HTML.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-2">
            <x-label for="slug" value="Slug (URL)" />
            <x-input id="slug" name="slug" type="text" class="mt-1 block w-full" wire:model.defer="slug" maxlength="25" />
            <x-input-error for="slug" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-label for="label" value="Nombre Corto" />
            <x-input id="label" name="label" type="text" class="mt-1 block w-full" wire:model.defer="label" maxlength="25" />
            <x-input-error for="label" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-label for="order" value="Orden en Menú" />
            <x-inputs.select id="order" wire:model.defer="order" class="mt-1 block w-full">
                <option value="" disabled selected>Seleccionar...</option>
                <option value="0">Esconder en el menú...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </x-inputs.select>
            <x-input-error for="order" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-label for="title" value="Título" />
            <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model.defer="title" maxlength="150" />
            <x-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-label for="content" value="Contenido" />
            <x-inputs.textarea id="content" name="content" rows="20" class="mt-1 block w-full" wire:model.defer="content"></x-inputs.textarea>
            <x-input-error for="content" class="mt-2" />
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