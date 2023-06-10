<table class="w-full text-sm text-left text-gray-500">
    @if (isset($header))
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                {{ $header }}
            </tr>
        </thead>
    @endif
    @if (isset($body))
        <tbody>
            {{ $body }}
        </tbody>
    @endif
</table>