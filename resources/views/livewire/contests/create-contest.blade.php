<div>
    <x-button wire:click="$set('creating', true)">{{ __('Create Contest') }}</x-button>

    <x-modal wire:model="creating">
        <x-form-section submit="create">
            <x-slot name="title">
                {{ __('Create Contest') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-1">
                    <x-label for="year" value="{{ __('Year') }}" />
                    <x-input id="year" name="year" type="text" class="mt-1 block w-full" wire:model.defer="year" />
                    <x-input-error for="year" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-5">
                    <x-label for="title" value="{{ __('Title') }}" />
                    <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model.defer="title" />
                    <x-input-error for="title" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-secondary-button wire:click="$toggle('creating')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ml-2">
                    {{ __('Create') }}
                </x-button>
            </x-slot>
        </x-form-section>
    </x-modal>
</div>