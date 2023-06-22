<x-website-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-9">
                    @livewire('contests.contest-application', ['user' => auth()->user()])
                </div>

                <div class="prose max-w-full p-9 pt-0">
                    <h1>{{ $contest->title }}</h1>
                    {!! $contest->description_html !!}
                </div>
            </div>
        </div>
    </div>
</x-website-layout>
