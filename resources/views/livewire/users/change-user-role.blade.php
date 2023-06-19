<div>
    <x-secondary-button wire:click="$set('updating', true)" class="px-[5px] py-[3px]" data-tooltip-target="tooltip-change-role">
        <x-icon name="academic-cap" class="inline-flex text-align-bottom w-4 h-4 px-0" /> 
    </x-secondary-button>

    <x-modal wire:model="updating">
        <x-form-section submit="update">
            <x-slot name="title">
                {{ __('Change Role') }} <span class="text-gray-500">- {{ $user->email }}</span>
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6">
                    <x-label for="role" value="{{ __('Role') }}" />
                    <x-inputs.select id="role" name="role" class="mt-1 block w-full" wire:model.defer="role">
                        <option value="contestant">{{ __('Contestant') }}</option>
                        <option value="admin">{{ __('Admin') }}</option>
                        <option value="superadmin">{{ __('Superadmin') }}</option>
                    </x-inputs.select>
                    <x-input-error for="role" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-secondary-button wire:click="$toggle('updating')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ml-2">
                    {{ __('Change') }}
                </x-button>
            </x-slot>
        </x-form-section>
    </x-modal>
</div>