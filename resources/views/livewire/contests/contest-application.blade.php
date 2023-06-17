<div>
    <x-button wire:click="$set('applying', true)">{{ __('Apply now!')}}</x-button>

    <x-modal wire:model="applying">
        @if ($user)
            <x-form-section submit="create">
                <x-slot name="title">
                    {{ __('Apply to Contest') }}
                </x-slot>

                <x-slot name="content">
                    <div>
                    <label>{{ __('First Name') }}</label>
                    <p>{{ $user->name }}</p>
                    </div> 
                    <label>{{ __('Last Name') }}</label>
                    <p>{{ $user->last_name }}</p>            
                </x-slot>

                <x-slot name="actions">
                    <x-secondary-button wire:click="$toggle('applying')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-button class="ml-2">
                        {{ __('Apply!') }}
                    </x-button>
                </x-slot>
            </x-form-section>
        @else
            <x-action-section>
                <x-slot name="title">
                    {{ __('Apply to Contest') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('You need to log in or sign up to register to this contest.') }}
                </x-slot>

                <x-slot name="content">
                    <x-link-button href="{{ route('login') }}">{{ __('Log in') }}</x-link-button>
                    <x-link-button href="{{ route('register') }}">{{ __('Sign up') }}</x-link-button>
                </x-slot>
            </x-action-section>
        @endif
    </x-modal>
</div>
