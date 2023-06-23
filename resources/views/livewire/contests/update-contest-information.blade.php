<x-form-section submit="update">
    <x-slot name="title">
        {{ __('Edit Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Edit your contest information. Year should be unique, and description can use Markdown, HTML and Tailwind CSS.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-1">
            <x-label for="year" value="{{ __('Year') }}" />
            <x-input id="year" name="year" type="text" class="mt-1 block w-full" wire:model="year" />
            <x-input-error for="year" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-5">
            <x-label for="title" value="{{ __('Title') }}" />
            <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model="title" />
            <x-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-label for="description" value="{{ __('Description') }}" />
            <x-inputs.textarea id="description" name="description" rows="20" class="mt-1 block w-full" wire:model="description"></x-inputs.textarea>
            <x-input-error for="description" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved!') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>