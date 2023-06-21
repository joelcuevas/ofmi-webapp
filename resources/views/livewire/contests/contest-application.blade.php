<div>
    <x-button wire:click="$set('applying', true)">{{ __('Apply now!')}}</x-button>

    <x-modal wire:model="applying">
        @if ($user)
            <x-form-section submit="apply">
                <x-slot name="title">
                    {{ __('Apply to Contest') }}
                </x-slot>

                <x-slot name="form">
                    @if ($user->isContestant())
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
                            <x-input-error for="school_level" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="school_grade" value="{{ __('School Grade') }}" />
                            <x-inputs.select id="school_grade" class="mt-1 block w-full">
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
                            <x-input-error for="school_grade" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label for="school_name" value="{{ __('School Name') }}" />
                            <x-input id="school_name" type="text" class="mt-1 block w-full" wire:model.defer="school_name" />
                            <x-input-error for="school_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="tshirt_size" value="{{ __('T-shirt Size') }}" />
                            <x-inputs.select id="tshirt_size" class="mt-1 block w-full">
                                <option value="" disabled selected>{{ __('Select...') }}</option>
                                <option value="XS">{{ __('XS') }}</option>
                                <option value="S">{{ __('S') }}</option>
                                <option value="M">{{ __('M') }}</option>
                                <option value="L">{{ __('L') }}</option>
                                <option value="XL">{{ __('XL') }}</option>
                                <option value="XXL">{{ __('XXL') }}</option>
                            </x-inputs.select>
                            <x-input-error for="tshirt_size" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="tshirt_style">
                                {{ __('T-shirt Style') }}
                                <x-icon data-popover-target="popover-default" name="question-mark-circle" class="inline align-text-top text-gray-600 cursor-pointer w-4 h-4 px-0" /> 
                            </x-label>
                            <x-inputs.select id="tshirt_style" class="mt-1 block w-full">
                                <option value="" disabled selected>{{ __('Select...') }}</option>
                                <option value="A">{{ __('Style A (Straight)') }}</option>
                                <option value="B">{{ __('Style B (Fitted)') }}</option>
                            </x-inputs.select>
                            <x-input-error for="tshirt_style" class="mt-2" />
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

                        @section('read_rules')<a href="{{ route('rules') }}" class="text-indigo-700 underline hover:no-underline">{{ __('rules') }}</a>@overwrite
                        @section('read_announcement')<a href="{{ route('contest') }}" class="text-indigo-700 underline hover:no-underline">{{ __('announcement') }}</a>@overwrite

                        <div class="col-span-6 flex justify-between items-flex-start">   
                            <x-checkbox name="terms_and_conditions" id="terms_and_conditions" class="mr-2 mt-1" /> 
                            <label for="terms_and_conditions" class="text-sm">
                                {!! __('I have read and understood the contest :announcement and it\'s :rules, and I meet the eligibility requirements, including my identification as a woman or non-binary person.', [
                                    'rules' => view()->yieldContent('read_rules'),
                                    'announcement' => view()->yieldContent('read_announcement'),
                                ]) !!}
                            </label>   
                        </div>
                    @else
                        {{ __('Only contestants can apply to a contest.') }}
                    @endif          
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
