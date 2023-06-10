@props(['submit', 'placeholder'])

<form submit="{{ $submit }}" method="GET">
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <x-icon name="magnifying-glass" class="w-5 h-5 text-gray-500"/>
        </div>
        @if (request()->q) 
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <a href="{{ $submit }}">
                    <x-icon name="x-mark" class="w-5 h-5 text-gray-500"/>
                </a>
            </div>
        @endif
        <input type="text" name="q" placeholder="{{ $placeholder }}" value="{{ request()->q }}" class="block p-2 pl-10 pr-10 text-sm text-gray-900 border border-gray-200 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
</form>