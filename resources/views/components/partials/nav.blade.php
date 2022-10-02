<header class="flex-shrink-0 border-b-2 bg-white">
    <div class="flex items-center justify-between p-2">
        <!-- Navbar left -->
        <div class="flex items-center space-x-3">
            <a href="/" class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">Veterinaria</a>
            <!-- Toggle sidebar button -->
            <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                <svg class="w-5 h-5 text-gray-600"
                    :class="{ 'transform transition-transform -rotate-180': isSidebarOpen }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Mobile search box -->
        <div x-show.transition="isSearchBoxOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            <div @click.away="isSearchBoxOpen = false"
                class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md">
                <!-- close button -->
                <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navbar right -->
        <div class="relative flex items-center space-x-3">
            <!-- avatar button -->
            <div class="relative" x-data="{ isOpen: false }">
                <a href="{{ route('profile.show') }}">
                    <div class='flex items-center'>
                        <img src='https://picsum.photos/60/60' class='rounded-full w-8 h-auto mr-2'>
                        <div class="mr-10">
                            <h3 class="font-semibold"> {{ auth()->user()->name }} </h2>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</header>
