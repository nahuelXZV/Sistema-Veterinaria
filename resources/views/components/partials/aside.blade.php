 <!-- Sidebar backdrop -->
 <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
     style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>
 <aside x-transition:enter="transition transform duration-300"
     x-transition:enter-start="-translate-x-full opacity-30  ease-in"
     x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
     x-transition:leave-start="translate-x-0 opacity-100 ease-out"
     x-transition:leave-end="-translate-x-full opacity-0 ease-in"
     class="text-white bg-sky-700 fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
     :class="{ '-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen }">

     <!-- sidebar header -->
     <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{ 'lg:justify-center': !isSidebarOpen }">
         <span class="p-2 text-lg font-bold leading-8 tracking-wider uppercase whitespace-nowrap">
             <a href="/" :class="{ 'lg:hidden': !isSidebarOpen }">Veterinaria</a>
         </span>
         <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
             <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
             </svg>
         </button>
     </div>

     <!-- Sidebar links -->
     <nav class="flex-1 ">
         {{-- overflow-y-scroll hover:overflow-y-auto --}}
         <ul class="p-2">
             <li>
                 <a href="/" class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600"
                     :class="{ 'justify-center': !isSidebarOpen }">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Inicio</span>
                 </a>
                 <a href="{{ route('profile.show') }}"
                     class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('profile.show')) bg-gray-700 @endif"
                     :class="{ 'justify-center': !isSidebarOpen }">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Perfil</span>
                 </a>

                 <!-- MODULO SISTEMA... -->
                 <h1 class="flex items-center space-x-2 font-bold" :class="{ 'justify-center': !isSidebarOpen }">
                     <span :class="{ 'hidden': isSidebarOpen }">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">SISTEMA</span>
                 </h1>

                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 "
                     :class="{ 'justify-center': !isSidebarOpen }">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Usuarios</span>
                 </a>
                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 "
                     :class="{ 'justify-center': !isSidebarOpen }">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Roles</span>
                 </a>
                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 "
                     :class="{ 'justify-center': !isSidebarOpen }">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Bitácora</span>
                 </a>
             </li>

         </ul>
         <!-- Sidebar footer -->
         <div class="flex-shrink-0 p-2 border-t max-h-10 text-gray-900">
             <form method="POST" action="{{ route('logout') }}">
                 @csrf

                 <button href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                   this.closest('form').submit();" type="button"
                     class="flex items-center justify-center w-full space-x-1 font-medium tracking-wider bg-white border rounded-md focus:outline-none focus:ring">
                     <span>
                         <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }"> Cerrar Sesión </span>
                 </button>
             </form>
         </div>
     </nav>
 </aside>
