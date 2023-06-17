<x-action-section submit="update">
    <x-slot name="title">
        {{ __('Activate Contest') }}
    </x-slot>

    <x-slot name="description">
        {{ __('An active contest shows on the homepage (only one contest can be active at a time).') }}
    </x-slot>

    <x-slot name="content">
        @if (! $contest->active)
            <h3 class="text-lg font-medium text-gray-900">
                <div class="h-2.5 w-2.5 rounded-full bg-gray-400 mr-2 inline-block"></div>
                This contest is inactive.
            </h3>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    {{ __('Activating this contest will publish it and show it on the homepage. All other contests will be deactivated. If the contest has yet to start, the homepage will display its description as a call for registration; if it\'s in progress or finished, it will show its updates and results.') }}
                </p>
            </div>
            <div class="flex items-center mt-5">
                <x-button wire:click="$set('confirmingActivation', true)" wire:loading.attr="disabled">
                    {{ __('Activate') }}
                </x-button>

                <x-action-message class="ml-3" on="loggedOut">
                    {{ __('Done.') }}
                </x-action-message>
            </div>
        @else
            <h3 class="text-lg font-medium text-gray-900">
                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2 inline-block"></div>
                This contest is active.
            </h3>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    {{ __('To deactivate it, you must activate another contest.') }}
                </p>
            </div>
        @endif

        <x-dialog-modal wire:model="confirmingActivation">
            <x-slot name="title">
                {{ __('Activate Contest') }}
            </x-slot>

            <x-slot name="content">
                <div class="text-red-700">
                    <p class="mb-4">{{ __('Activating this contest will publish it and show it on the homepage. All other contests will be deactivated. If the contest has yet to start, the homepage will display its description as a call for registration; if it\'s in progress or finished, it will show its updates and results.') }}</p>
                    <p class="font-bold">{{ __('Do you confirm?') }}</p>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingActivation')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="activate" wire:loading.attr="disabled">
                    {{ __('Yes, activate') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>