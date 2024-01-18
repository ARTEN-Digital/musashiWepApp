<div x-data="setup()">
    <div class="flex h-screen antialiased text-gray-900 bg-gray-100">
        <!-- Sidebar -->
        <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen" class="fixed inset-y-0 z-10 flex w-64">
            <!-- Sidebar content -->
            <div class="z-10 bg-white flex flex-col flex-1 rounded-lg">
                <div class="flex items-center justify-between flex-shrink-0 p-4">
                    <!-- Logo -->
                    <img class="w-3/4" src="imgs/logos/logo.png" alt="">

                    <!-- Close btn -->
                    <button @click="isSidebarOpen = false" class="p-1 w-fit rounded-lg focus:outline-none focus:ring ml-auto">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">Close sidebar</span>
                    </button>
                </div>

                <nav class="flex flex-col flex-1 w-64 p-4 mt-4">
                    <a href="#" class="flex items-center space-x-2">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Usuarios</span>
                    </a>
                </nav>

                <div class="flex-shrink-0 p-4">
                    <button class="flex items-center space-x-2">
                        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Logout</span>
                    </button>
                </div>

            </div>
        </div>
        <main class="flex flex-col items-center justify-center flex-1">
            <!-- Page content -->
            <button @click="isSidebarOpen = true" class="fixed p-2 text-white bg-black rounded-lg top-5 left-5">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="sr-only">Open menu</span>
            </button>
            <h1 class="sr-only">Home</h1>
            
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js"></script>
<script>
    const setup = () => {
    return {
          isSidebarOpen: true,
        }
    }
</script>