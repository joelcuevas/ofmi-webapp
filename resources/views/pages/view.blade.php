<x-website-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="prose max-w-full p-9">
                    <h1>{{ $page->title }}</h1>
                    {!! $page->content_html !!}
                </div>
            </div>
        </div>
    </div>
</x-website-layout>
