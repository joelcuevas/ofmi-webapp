<x-website-layout>
    <x-slot name="header">
        {{ __('Profile') }}
    </x-slot>

    <div class="bg-gray-100 py-9">
        <div class="web-container">
            <div class="md:grid md:grid-cols-10 md:gap-6">
                <div class="md:col-span-3">
                    <div class="bg-white p-6 pt-1 shadow sm:rounded-md text-sm text-gray-500">
                        <x-configs.menu-header>User Profile</x-configs.menu-header>
                        <x-configs.menu-item link="#profile" icon="user">{{ __('Profile Information') }}</x-configs.menu-item>
                        <x-configs.menu-item link="#passwords" icon="lock-closed">{{ __('Update Password') }}</x-configs.menu-item>
                        <x-configs.menu-item link="#2fa" icon="shield-check">{{ __('Two Factor Authentication') }}</x-configs.menu-item>
                        <x-configs.menu-item link="#sessions" icon="globe-americas">{{ __('Browser Sessions') }}</x-configs.menu-item>
                        <x-configs.menu-item link="#delete" icon="face-frown">{{ __('Delete Account') }}</x-configs.menu-item>
                    </div>
                </div>
                <div class="md:col-start-4 md:col-span-7">
                    <x-configs.block anchor="profile">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')
                        @endif
                    </x-configs.block>

                    <x-configs.block anchor="passwords">
                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            @livewire('profile.update-password-form')
                        @endif
                    </x-configs.block>

                    <x-configs.block anchor="2fa">
                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                            @livewire('profile.two-factor-authentication-form')
                        @endif
                    </x-configs.block>

                    <x-configs.block anchor="sessions">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </x-configs.block>

                    <x-configs.block anchor="delete" separator="false">
                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                            @livewire('profile.delete-user-form')
                        @endif
                    </x-configs.block>
                </div>
            </div>
        </div>
    </div>
</x-website-layout>
