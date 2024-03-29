<x-website-layout>
    <div class="bg-gray-100 py-[10em]">
        <div class="web-container">
            
        </div>
    </div>
    <div class="py-12">
        <div class="web-container">
            <div class="bg-white overflow-hidden">

                <div >
                    @livewire('contests.contest-application', ['user' => auth()->user()])
                </div>

                <div class="prose max-w-3xl">
                    <h1>{{ $contest->title }}</h1>
                    {!! $contest->description_html !!}
                </div>
            </div>
        </div>
    </div>
</x-website-layout>
