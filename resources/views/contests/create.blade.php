<x-app-layout>
    <x-slot name="header">
        {{ __('Contests') }}
        <x-icon name="chevron-double-right" class="inline-flex h-4 w-4" />
        {{ __('Create') }}
    </x-slot>

    <x-content-card>
        <form action="{{ route('contests.store') }}" method="POST">
            @csrf
            <div class="px-6 py-5">
                <x-validation-errors />
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-1">
                        <x-label for="year" value="{{ __('Year') }}" />
                        <x-input id="year" name="year" value="{{ old('year') }}" type="text" class="block w-full" />
                    </div>
                    <div class="col-span-6 sm:col-span-5">
                        <x-label for="title" value="{{ __('Title') }}" />
                        <x-input id="title" name="title" value="{{ old('title') }}" type="text" class="block w-full" />
                    </div>
                    <div class="col-span-6">
                        <x-label for="content" value="{{ __('Content') }}" />
                        <textarea id="content" name="content" type="text" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="20" placeholder="{{ __('# Markdown __supported__.') }}">{{ old('content') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <x-button type="submit">{{ __('Save') }}</x-button>
            </div>
        </form>
    </x-content-card>
</x-app-layout>