@props(['submit'])

<div class="mt-5 md:mt-0">
    <form wire:submit.prevent="{{ $submit }}">
        <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
            @if (isset($title))
                <div class="px-4 mb-5 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
                    @if (isset($description))
                        <p class="mt-1 text-sm text-gray-600">{{ $description }}</p>
                    @endif
                </div>
            @endif
            <div class="grid grid-cols-6 gap-6">
                {{ $form }}
            </div>
        </div>

        @if (isset($actions))
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                {{ $actions }}
            </div>
        @endif
    </form>
</div>

