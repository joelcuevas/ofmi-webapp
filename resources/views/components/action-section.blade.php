<div class="mt-5 md:mt-0">
    <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
        @if (isset($title))
            <div class="px-4 mb-5 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
                @if (isset($description))
                    <p class="mt-1 text-sm text-gray-600">{{ $description }}</p>
                @endif
            </div>
        @endif
        {{ $content }}
    </div>
</div>

