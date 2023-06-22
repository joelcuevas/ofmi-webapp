<div>
    <x-button wire:click="$set('applying', true)">{{ __('Apply now!')}}</x-button>

    <x-modal wire:model="applying">
        @if ($user)
            <x-form-section submit="apply">
                <x-slot name="title">
                    {{ __('Apply to Contest') }}
                </x-slot>

                @if ($user->isContestant())
                    @if (! $userRegistered)
                        <x-slot name="form">
                            <div class="col-span-6 border border-gray-300 rounded-md shadow-sm p-5">
                                <p class="mb-3 text-sm text-orange-600 font-bold flex justify-between items-center">
                                    {{ __('Before continuing, please confirm your profile information is up-to-date; this is important to guarantee your participation in the contest.') }}
                                </p>
                                <p class="mb-2"><x-label value="{{ __('Name') }}" /> {{ $user->getFullName() }}</p>
                                <p class="mb-2"><x-label value="{{ __('Email') }}" /> {{ $user->email }}</p>
                                <p class="mb-2"><x-label value="{{ __('Birth Date') }}" /> {{ $user->birth_date }}</p>
                                <p class="mb-2"><x-label value="{{ __('Address (we will send you a package)') }}" /> {{ $user->getFullAddress() }}</p>
                                <p class="mb-3"><x-label value="{{ __('Phone Number') }}" /> {{ $user->phone_number }}</p>
                                <a class="text-indigo-600 underline text-sm hover:no-underline" href="{{ route('profile.show') }}">{{ __('I need to update my information!') }}</a>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="school_level" value="{{ __('School Level') }}" />
                                <x-inputs.select id="school_level" class="mt-1 block w-full" wire:model="schoolLevel">
                                    <option value="" disabled selected>{{ __('Select...') }}</option>
                                    <option value="primary">{{ __('Primary School') }}</option>
                                    <option value="middle">{{ __('Middle School') }}</option>
                                    <option value="high">{{ __('High School') }}</option>
                                </x-inputs.select>
                                <x-input-error for="schoolLevel" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="school_grade" value="{{ __('School Grade') }}" />
                                <x-inputs.select id="school_grade" wire:model.defer="schoolGrade" class="mt-1 block w-full">
                                    @if ($schoolLevel == '')
                                        <option value="" disabled selected>{{ __('Select a school level first...') }}</option>
                                    @else
                                        <option value="" disabled selected>{{ __('Select...') }}</option>
                                        <option value="1">{{ __('1st') }}</option>
                                        <option value="2">{{ __('2nd') }}</option>
                                        <option value="3">{{ __('3rd') }}</option>
                                        @if ($schoolLevel == 'primary')
                                            <option value="4">{{ __('4th') }}</option>
                                            <option value="5">{{ __('5th') }}</option>
                                            <option value="6">{{ __('6th') }}</option>
                                        @endif
                                    @endif
                                </x-inputs.select>
                                <x-input-error for="schoolGrade" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="school_name" value="{{ __('School Name') }}" />
                                <x-input id="school_name" wire:model.defer="schoolName" type="text" class="mt-1 block w-full" />
                                <x-input-error for="schoolName" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="tshirt_size" value="{{ __('T-shirt Size') }}" />
                                <x-inputs.select id="tshirt_size" wire:model.defer="tshirtSize" class="mt-1 block w-full">
                                    <option value="" disabled selected>{{ __('Select...') }}</option>
                                    <option value="XS">{{ __('XS') }}</option>
                                    <option value="S">{{ __('S') }}</option>
                                    <option value="M">{{ __('M') }}</option>
                                    <option value="L">{{ __('L') }}</option>
                                    <option value="XL">{{ __('XL') }}</option>
                                    <option value="XXL">{{ __('XXL') }}</option>
                                </x-inputs.select>
                                <x-input-error for="tshirtSize" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="tshirt_style">
                                    {{ __('T-shirt Style') }}
                                    <x-icon data-popover-target="popover-default" name="question-mark-circle" class="inline align-text-top text-gray-600 cursor-pointer w-4 h-4 px-0" /> 
                                </x-label>
                                <x-inputs.select id="tshirt_style" wire:model.defer="tshirtStyle" class="mt-1 block w-full">
                                    <option value="" disabled selected>{{ __('Select...') }}</option>
                                    <option value="A">{{ __('Style A (Straight)') }}</option>
                                    <option value="B">{{ __('Style B (Fitted)') }}</option>
                                </x-inputs.select>
                                <x-input-error for="tshirtStyle" class="mt-2" />
                            </div>

                            <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-auto text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-300 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                <div class="p-3">
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="col-span-1"><x-assets.tshirt-a /></div>
                                        <div class="col-span-1"><x-assets.tshirt-b /></div>
                                    </div>
                                    </p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>

                            @section('read_rules')<a href="{{ route('rules') }}" class="text-link">{{ __('rules') }}</a>@overwrite
                            @section('read_announcement')<a href="{{ route('contest') }}" class="text-link">{{ __('announcement') }}</a>@overwrite

                            <div class="col-span-6 flex justify-between items-flex-start">   
                                <x-checkbox wire:model.defer="acceptRules" value="1" id="acceptRules" class="mr-2 mt-1" /> 
                                <div>
                                    <label for="acceptRules" class="text-sm">
                                        {!! __('I have read and understood the contest :announcement and it\'s :rules, and I meet the eligibility requirements, including my identification as a woman or non-binary person.', [
                                            'rules' => view()->yieldContent('read_rules'),
                                            'announcement' => view()->yieldContent('read_announcement'),
                                        ]) !!}
                                    </label>   
                                    <x-input-error for="acceptRules" class="mt-2" />
                                </div>
                            </div>       
                        </x-slot>

                        <x-slot name="actions">
                            <x-action-message error class="mr-3" on="error">
                                {{ __('User can\'t be registered to this contest!') }}
                            </x-action-message>

                            <x-secondary-button wire:click="$toggle('applying')" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-button class="ml-2">
                                {{ __('Apply!') }}
                            </x-button>
                        </x-slot>
                    @else
                        <x-slot name="content">
                            <div class="p-4 bg-green-700 text-white rounded-md text-center">
                                <x-icon name="check-circle" class="inline w-10 h-10" />
                                <div>{{ __('You are registered for this contest!') }}</div>
                            </div>
                            <h3 class="text-lg font-medium mt-6 mb-4">{{ __('What\'s next?') }}</h3>
                            <p class="mb-2">{{ __('We recommend you to complete the following omegaUp courses:') }}</p>

                            <ul class="mb-4">
                                <li><a href="https://omegaup.com/course/introduccion_a_cpp/" class="text-link" target="_blank">Introducción a C++</a></li>
                                <li><a href="https://omegaup.com/course/introduccion_a_algoritmos/" class="text-link" target="_blank">Introducción a Algoritmos - Parte I</a></li>
                                <li><a href="https://omegaup.com/course/introduccion_a_algoritmos_ii/" class="text-link" target="_blank">Introducción a Algoritmos - Parte II</a></li>
                                <li><a href="https://omegaup.com/course/Curso-OMI/" class="text-link" target="_blank">Curso OMI</a></li>
                            </ul>

                            <p class="mb-2">{{ __('You can also practice with past contests problem sets:') }}</p>

                            <ul class="mb-4">
                                <li><a href="https://omegaup.com/arena/OFMI2022DIA1/#problems" class="text-link" target="_blank">OFMI 2022 - Día 1</a></li>
                                <li><a href="https://omegaup.com/arena/OFMI2022DIA2/#problems" class="text-link" target="_blank">OFMI 2022 - Día 2</a></li>
                            </ul>

                            @section('more_material')<a href="/material" class="text-link">{{ __('here') }}</a>@overwrite

                            <p>
                                {!! __('And you can find even more material :here!', [
                                    'here' => view()->yieldContent('more_material'),
                                ]) !!}
                            </p>
                        </x-slot>

                        <x-slot name="actions">
                            <x-button wire:click="$toggle('applying')" wire:loading.attr="disabled">
                                {{ __('Great!') }}
                            </x-button>
                        </x-slot>
                    @endif
                @else
                    <x-slot name="content">
                        <div class="p-4 bg-orange-700 text-white rounded-md text-center">
                            <x-icon name="exclamation-triangle" class="inline w-10 h-10" />
                            <div>{{ __('Oops! Only contestants can apply to a contest.') }}</div>
                        </div>
                    </x-slot>

                    <x-slot name="actions">
                        <a href="email:ofmi@omegaup.com" class="text-gray-600 hover:text-gray-900 underline hover:no-underline text-sm mr-3">Need help?</a>
                        <x-secondary-button wire:click="$toggle('applying')" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-secondary-button>
                    </x-slot>
                @endif
            </x-form-section>
        @else
            <x-action-section>
                <x-slot name="title">
                    {{ __('Apply to Contest') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('You need to register or log in to apply to this contest.') }}
                </x-slot>

                <x-slot name="content">
                    @section('ofmi_email')<a href="email:ofmi@omegaup.com" class="text-link">ofmi@omegaup.com</a>@overwrite
                    @section('discord_server')<a href="https://discord.gg/gn6GTb4rfG" target="_blank" class="text-link">{{ __('Discord server') }}</a>@overwrite

                    <p class="mb-7">
                        {!! __('Need help? Write us at :ofmi_email, or join our :discord_server and chat with other contestants and trainers!', [
                            'ofmi_email' => view()->yieldContent('ofmi_email'),
                            'discord_server' => view()->yieldContent('discord_server'),
                        ]) !!}
                    </p>
                    <x-link-button href="{{ route('register') }}">{{ __('Register') }}</x-link-button>
                    <a class="underline text-indigo-600 hover:no-underline ml-3" href="{{ route('login') }}">{{ __('Already have and account?') }}</a>
                </x-slot>
            </x-action-section>
        @endif
    </x-modal>
</div>
