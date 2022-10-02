<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Veterinaria</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('pngwing.com.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">

        <!-- Loading screen -->
        <div x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            Loading.....
        </div>

        <!-- Sidebar -->
        @include('components.partials.aside')

        <div class="flex flex-col flex-1 h-full overflow-hidden">

            <!-- Navbar -->
            @include('components.partials.nav')

            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 py-1 overflow-hidden overflow-y-scroll">
                {{-- @yield('content') --}}
                {{ $slot }}
            </main>

        </div>


        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        <script>
            window.innerWidth <= 768 ? open = false : open = true;
            const setup = () => {
                return {
                    loading: true,
                    isSidebarOpen: open,
                    toggleSidbarMenu() {
                        this.isSidebarOpen = !this.isSidebarOpen
                    },
                    isSettingsPanelOpen: false,
                    isSearchBoxOpen: false,

                }
            }
        </script>
        @livewireScripts
        @stack('modals')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    </div>
</body>

</html>
