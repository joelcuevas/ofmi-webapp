<x-form-section submit="update">
    <x-slot name="title">
        {{ __('Edit Page') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Edit your page content. Slug should be URL-safe and unique, and content can use Markdown, HTML and Tailwind CSS.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-2">
            <x-label for="slug" value="{{ __('URL Slug') }}" />
            <x-input id="slug" name="slug" type="text" class="mt-1 block w-full" wire:model.defer="slug" maxlength="25" />
            <x-input-error for="slug" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-label for="label" value="{{ __('Short Label') }}" />
            <x-input id="label" name="label" type="text" class="mt-1 block w-full" wire:model.defer="label" maxlength="25" />
            <x-input-error for="label" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-label for="order" value="{{ __('Menu Order') }}" />
            <x-inputs.select id="order" wire:model.defer="order" class="mt-1 block w-full">
                <option value="" disabled selected>{{ __('Select...') }}</option>
                <option value="0">{{ __('Hide in menu') }}</option>
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
            <x-label for="title" value="{{ __('Title') }}" />
            <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model.defer="title" maxlength="150" />
            <x-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-label for="content" value="{{ __('Content') }}" />
            <x-inputs.textarea id="content" name="content" rows="20" class="mt-1 block w-full" wire:model.defer="content"></x-inputs.textarea>
            <x-input-error for="content" class="mt-2" />
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