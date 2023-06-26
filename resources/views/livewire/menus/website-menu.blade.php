<nav x-data="{ open: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="web-container py-3">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-web-nav-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-indigo-600 transition ease-in-out duration-150">
                                Participa

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('contests.view', ['year' => '2023']) }}">
                                Convocatoria 2023
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('contests.results') }}">
                                Resultados
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('pages.view', ['slug' => 'reglamento']) }}">
                                Reglamento
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('pages.view', ['slug' => 'codigo-de-conducta']) }}">
                                Código de Conducta
                            </x-dropdown-link>
                        </x-slot>
                    </x-web-nav-dropdown>

                    <x-web-nav-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-indigo-600 transition ease-in-out duration-150">
                                Entrena

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('contests.view', ['year' => '2023']) }}">
                                Material de Estudio
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('contests.view', ['year' => '2023']) }}">
                                Preguntas Frecuentes
                            </x-dropdown-link>
                        </x-slot>
                    </x-web-nav-dropdown>

                    <x-web-nav-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-indigo-600 transition ease-in-out duration-150">
                                Contribuye

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('contests.view', ['year' => '2023']) }}">
                                Donaciones
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('contests.view', ['year' => '2023']) }}">
                                Voluntarios
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('contests.view', ['year' => '2023']) }}">
                                Sugiere un Problema
                            </x-dropdown-link>
                        </x-slot>
                    </x-web-nav-dropdown>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                @if (Auth::check())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                @if (Auth::user()->isAdmin())
                                    <x-dropdown-link href="{{ route('dashboard') }}">
                                        <x-icon name="star" class="inline-flex align-text-bottom w-4 h-4 mr-1" />
                                        Admin Panel
                                    </x-dropdown-link>
                                @endif

                                <!-- Account Management -->
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    <x-icon name="user" class="inline-flex align-text-bottom w-4 h-4 mr-1" />
                                    Perfil
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        <x-icon name="arrow-right-on-rectangle" class="inline-flex align-text-bottom w-4 h-4 mr-1" />
                                        Cerrar Sesión
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <x-web-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        Inicia Sesión
                    </x-web-nav-link>
                    <x-web-nav-link href="{{ route('register') }}" :active="request()->routeIs('login')">
                        Regístrate
                    </x-web-nav-link>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Inicio
            </x-responsive-nav-link>

            @foreach ($pages as $page)
                <x-responsive-nav-link href="{{ route('pages.view', $page->slug) }}" :active="request()->is($page->slug)">
                    {{ $page->label }}
                </x-responsive-nav-link>
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="space-y-1">
                @if (Auth::check())
                    @if (Auth::user()->isAdmin())
                        <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            <x-icon name="star" class="inline-flex align-text-bottom w-4 h-4 mr-1" /> 
                            Admin Panel
                        </x-responsive-nav-link>
                    @endif

                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        <x-icon name="user" class="inline-flex align-text-bottom w-4 h-4 mr-1" /> 
                        Perfil
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                            <x-icon name="arrow-right-on-rectangle" class="inline-flex align-text-bottom w-4 h-4 mr-1" /> 
                            Cerrar Sesión
                        </x-responsive-nav-link>
                    </form>
                @else
                    <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        Inicia Sesión
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        Regístrate
                    </x-responsive-nav-link>
                @endif
            </div>
        </div>
    </div>
</nav>
