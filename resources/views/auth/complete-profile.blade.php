<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:py-32 items-center pt-6 bg-gray-100">
        <div>
            <x-authentication-card-logo />
        </div>

        <div class="w-full sm:max-w-4xl mt-6 shadow-md overflow-hidden sm:rounded-lg">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form', ['onboarding' => true])
            @endif
        </div>
    </div>
</x-guest-layout>
