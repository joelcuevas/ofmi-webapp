<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <x-slot name="toolbar">
        <!-- Search -->
        <div class="flex items-right justify-between">
            <form>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <a href="{{ route('users.index') }}">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    </div>
                    <input type="text" name="q" placeholder="{{ __('Search for users') }}" value="{{ request()->q }}" class="block p-2 pl-10 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-4">                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Name') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Role') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                        <!-- <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg"> -->
                                        <div class="xpl-3">
                                            <div class="text-base font-semibold">{{ $user->name }} {{ $user->last_name }}</div>
                                            <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                        </div>  
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ __(ucfirst($user->role)) }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        @if (request()->user()->isSuperadmin())
                                            @if ($user->hasRole('admin'))
                                                <a href="{{ route('users.make-contestant', $user) }}" class="font-medium text-indigo-600" data-tooltip-target="tooltip-make-contestant">
                                                    <svg class="inline w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </a>
                                            @elseif ($user->hasRole('contestant'))
                                                <a href="{{ route('users.make-admin', $user) }}" class="font-medium text-indigo-600" data-tooltip-target="tooltip-make-admin">
                                                    <svg class="inline w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </a>
                                            @else   
                                                <span class="font-medium text-gray-300">
                                                    <svg class="inline w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $users->links() }}
        </div>
    </div>
    <div id="tooltip-make-admin" role="tooltip" class="absolute z-10 invisible inline-block display-none px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        {{ __('Make admin') }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <div id="tooltip-make-contestant" role="tooltip" class="absolute z-10 invisible inline-block display-none px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        {{ __('Make contestant') }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</x-app-layout>