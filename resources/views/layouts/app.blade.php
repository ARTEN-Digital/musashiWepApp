<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Musashi') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        @livewireScripts
        
        <x-banner />
        <div class="lg:bg-gray-100">
            <div x-data="setup()">
                <div class="flex h-screen antialiased text-gray-900 lg:bg-gray-100">
                    <!-- Sidebar -->
                    <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen" class="fixed inset-y-0 z-10 flex w-72 shadow-lg">
                        <!-- Sidebar content -->
                        <div class="z-10 bg-white flex flex-col flex-1 rounded-lg">
                            <div class="flex items-center justify-between flex-shrink-0 p-4">
                                <!-- Logo -->
                                <img class="w-3/4" src="/imgs/logos/logo.png" alt="">
                                <!-- Close btn -->
                                <button @click="isSidebarOpen = false" class="p-1 w-fit rounded-lg focus:outline-none focus:ring ml-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M10.72 11.47a.75.75 0 0 0 0 1.06l7.5 7.5a.75.75 0 1 0 1.06-1.06L12.31 12l6.97-6.97a.75.75 0 0 0-1.06-1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M4.72 11.47a.75.75 0 0 0 0 1.06l7.5 7.5a.75.75 0 1 0 1.06-1.06L6.31 12l6.97-6.97a.75.75 0 0 0-1.06-1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Close sidebar</span>
                                </button>
                            </div>
                            <nav class="flex flex-col flex-1 w-64 p-4 mt-4">
                                <a href="/users" class="flex items-center space-x-2 my-1 hover:bg-gray-200 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="">Usuarios</span>
                                </a>
                                <a href="/areasprocess" class="flex items-center space-x-2 my-1 hover:bg-gray-200 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="">Áreas y operaciones</span>
                                </a>
                                <a href="/trainings" class="flex items-center space-x-2 my-1 hover:bg-gray-200 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="">Capacitaciones</span>
                                </a>
                                <a href="/reports/skillsmatrix" class="flex items-center space-x-2 my-1 hover:bg-gray-200 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="">Reportes</span>
                                </a>
                                <a href="/assignment" class="flex items-center space-x-2 my-1 hover:bg-gray-200 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                                    </svg>
                                    <span class="">Asignación</span>
                                </a>
                            </nav>
                            <div class="relative flex items-center flex-shrink-0 p-3" x-data="{ isOpen: false }">
                                <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})" class="transition-opacity flex p-2 rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-primaryColor focus:ring-offset-white focus:ring-offset-2">
                                    <img class="w-10 h-10 rounded-full shadow-md" src="{{Auth::user()->image_profile}}"/>
                                    <div class="text-left ml-2">
                                        <p class="text-sm">{{Auth::user()->name . ' ' . Auth::user()->lastname}}</p>
                                        <p class="text-sm">{{Auth::user()->email}}</p>
                                    </div>
                                 </button>
                                <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu" tabindex="-1" class="absolute w-48 p-2 bg-white rounded-md shadow-xl left-20 bottom-16 focus:outline-none" role="menu" aria-orientation="vertical" aria-label="user menu">
                                      
                                    <div class="text-base  text-gray-900">
                                        <button class="flex w-full px-4 py-2 text-sm hover:bg-gray-200 rounded-lg" type="submint">
                                            <p>Mi perfil</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mx-auto my-auto">
                                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="text-base  text-gray-900">
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button class="flex w-full px-4 py-2 text-sm hover:bg-gray-200 rounded-lg" type="submint">
                                                <p>Cerrar sesión</p>
                                                <svg class="w-5 h-5 mx-auto my-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <main class="flex flex-col flex-1 py-14 lg:py-9 lg:pl-20 lg:pr-10">
                        {{-- boton para abrir sidebar --}}
                        <button @click="isSidebarOpen = true" class="fixed p-2 text-white bg-primaryColor rounded-lg top-5 left-5">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span class="sr-only">Open menu</span>
                        </button>
                        <h1 class="sr-only">Home</h1>

                        

                        {{-- vistas en general --}}
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
        @stack('modals')
        
    </body>
    
<script>
    const setup = () => {
    return {
          isSidebarOpen: false,
        }
    }
</script>
</html>