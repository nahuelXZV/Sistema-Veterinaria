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
                 <a href="/"
                     class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('dashboard')) bg-sky-800 @endif"
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

                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('usuario.index')) bg-sky-800 @endif "
                     :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('usuario.index') }}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Usuarios</span>
                 </a>
                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('roles.index')) bg-sky-800 @endif"
                     :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('roles.index') }}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Roles</span>
                 </a>
                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('bitacora.index')) bg-sky-800 @endif "
                     :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('bitacora.index') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Bitácora</span>
                 </a>


                 <h1 class="flex items-center space-x-2 font-bold" :class="{ 'justify-center': !isSidebarOpen }">
                     <span :class="{ 'hidden': isSidebarOpen }">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">SERVICIO</span>
                 </h1>

                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('cliente.index')) bg-sky-800 @endif "
                     :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('cliente.index') }}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                         </svg>

                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Clientes</span>
                 </a>
                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('mascota.index')) bg-sky-800 @endif "
                     :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('mascota.index') }}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Mascotas</span>
                 </a>

                 <h1 class="flex items-center space-x-2 font-bold" :class="{ 'justify-center': !isSidebarOpen }">
                     <span :class="{ 'hidden': isSidebarOpen }">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">COMPRA / VENTA</span>
                 </h1>

                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('producto.index')) bg-sky-800 @endif "
                     :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('producto.index') }}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Productos</span>
                 </a>
                 <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('nota_compra.index')) bg-sky-800 @endif "
                     :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('nota_compra.index') }}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Compras</span>
                 </a>
             </li>
         </ul>
     </nav>
 </aside>
