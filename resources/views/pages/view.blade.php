<x-website-layout>
    <div class="py-6">
        <div class="web-container">
            <div class="bg-white overflow-hidden">
                <div class="prose max-w-3xl">
                    <h1>{{ $page->title }}</h1>
                    {!! $page->content_html !!}
                </div>
            </div>
        </div>
    </div>
</x-website-layout>
