@props(['submit', 'placeholder'])

<form submit="{{ $submit }}" method="GET">
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <x-icon name="magnifying-glass" class="w-5 h-5 text-gray-400"/>
        </div>
        @if (request()->q) 
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <a href="{{ $submit }}">
                    <x-icon name="x-mark" class="w-5 h-5 text-gray-400"/>
                </a>
            </div>
        @endif
        <x-input type="text" name="q" placeholder="{{ $placeholder }}" value="{{ request()->q }}" class="block p-2 pl-10 pr-10 w-80 text-sm" />
    </div>
</form>