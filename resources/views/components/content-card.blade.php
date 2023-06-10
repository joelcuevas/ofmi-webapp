<div class="py-9">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border overflow-hidden sm:rounded-lg mb-4">                
            <div class="relative overflow-x-auto sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        
        @if (isset($pagination))
            {{ $pagination }}
        @endif
    </div>
</div>

@if (isset($tooltips))
    {{ $tooltips }}
@endif
