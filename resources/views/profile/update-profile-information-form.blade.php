<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        @if (! request()->user()->profile_complete)
            {{ __('Complete your account\'s profile information.') }}
        @else
            {{ __('Update your account\'s profile information.') }}
        @endif
        
    </x-slot>

    <x-slot name="form">
        <!-- First Name -->
        <div class="col-span-10 sm:col-span-5">
            <x-label for="name" value="{{ __('First Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-span-10 sm:col-span-5">
            <x-label for="last_name" value="{{ __('Last Name') }}" />
            <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" />
            <x-input-error for="last_name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-10 sm:col-span-7">
            <x-label for="email" value="{{ __('Email (this is your login)') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Bith Date -->
        <div class="col-span-10 sm:col-span-3">
            <x-label for="birth_date" value="{{ __('Birth Date') }}" />
            <x-input id="birth_date" type="text" class="mt-1 block w-full" wire:model.defer="state.birth_date" placeholder="dd/mm/yyyy" />
            <x-input-error for="birth_date" class="mt-2" />
        </div>

        <!-- Pronoun -->
        <div class="col-span-10 sm:col-span-2">
            <x-label for="pronoun" value="{{ __('Pronoun') }}" />
            <x-inputs.select id="pronoun" type="text" class="mt-1 block w-full" wire:model.defer="state.pronoun">
                <option value="" disabled selected>{{ __('Choose...') }}</option>
                <option value="She">{{ __('She') }}</option>
                <option value="They">{{ __('They') }}</option>
                <option value="He">{{ __('He') }}</option>
                <option value="Other">{{ __('Other') }}</option>
            </x-inputs.select>
            <x-input-error for="pronoun" class="mt-2" />
        </div>

        <!-- Display Name -->
        <div class="col-span-10 sm:col-span-8">
            <x-label for="display_name" value="{{ __('Display Name (as you want to be shown in your certificates)') }}" />
            <x-input id="display_name" type="text" class="mt-1 block w-full" wire:model.defer="state.display_name" />
            <x-input-error for="display_name" class="mt-2" />
        </div>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-10 sm:col-span-10">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <div class="md:flex items-center mt-4">
                    <div class="w-32 min-w-32 mr-1">
                        <!-- Current Profile Photo -->
                        <div x-show="! photoPreview">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-28 w-28 object-cover">
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div x-show="photoPreview" style="display: none;">
                            <span class="block rounded-full w-28 h-28 bg-cover bg-no-repeat bg-center"
                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>
                    </div>

                    <div class="text-sm mt-3 md:mt-0 md:w-3/4">
                        <p class="mb-2">
                            {{ __('Would you share a picture of yourself? We will show it in the public ceremonies and slideshows!') }}
                            {{ __('Try to show your face and shoulders, and please use a solid-colored background.') }}
                        </p>

                        <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select A New Photo') }}
                        </x-secondary-button>

                        @if ($this->user->profile_photo_path)
                            <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photo') }}
                            </x-secondary-button>
                        @endif

                        <x-input-error for="photo" class="mt-2" />
                    </div>
                </div>
            </div>
        @endif

        <hr class="col-span-10 mt-4 mb-2">
        <h4 class="text-md font-medium text-gray-900 col-span-10">{{ __('Contact Information') }}</h4>

        <!-- Country -->
        <div class="col-span-10 sm:col-span-2">
            <x-label for="country" value="{{ __('Country') }}" />
            <x-inputs.select-country id="country" class="mt-1 block w-full" wire:model="state.country" />
            <x-input-error for="country" class="mt-2" />
        </div>
        
        <!-- State -->
        <div class="col-span-10 sm:col-span-4">
            <x-label for="state" value="{{ __('State') }}" />
            @if ($state['country'] == 'MX')
                <!-- State: MX -->
                <x-inputs.select id="state" type="text" class="mt-1 block w-full" wire:model.defer="state.state">
                    <option value="" disabled selected hidden>{{ __('Choose...') }}</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Ciudad de México">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                </x-inputs.select>
            @else
                <!-- State: Other -->
                <x-input id="state" type="text" class="mt-1 block w-full" wire:model.defer="state.state" />
            @endif
            <x-input-error for="state" class="mt-2" />
        </div>

        <!-- City -->
        <div class="col-span-10 sm:col-span-4">
            <x-label for="city" value="{{ __('City') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" />
            <x-input-error for="city" class="mt-2" />
        </div>

        <!-- Street and Number -->
        <div class="col-span-10 sm:col-span-5">
            <x-label for="street_and_number" value="{{ __('Street and Number') }}" />
            <x-input id="street_and_number" type="text" class="mt-1 block w-full" wire:model.defer="state.street_and_number" />
            <x-input-error for="street_and_number" class="mt-2" />
        </div>

        <!-- Postal Code -->
        <div class="col-span-10 sm:col-span-2">
            <x-label for="postal_code" value="{{ __('Postal Code') }}" />
            <x-input id="postal_code" type="text" class="mt-1 block w-full" wire:model.defer="state.postal_code" />
            <x-input-error for="postal_code" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="col-span-10 sm:col-span-3">
            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
            <x-input id="phone_number" type="text" class="mt-1 block w-full" wire:model.defer="state.phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved!') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
