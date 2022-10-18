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
             <a href="/" :class="{ 'lg:hidden': !isSidebarOpen }">Mundo Mascota</a>
         </span>
         <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
             <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
             </svg>
         </button>
     </div>

     <!-- Sidebar links -->
     <nav class="flex-1 overflow-auto hover:overflow-y-scroll">
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
                 @if (Auth::user()->can('usuario.index') ||
                     Auth::user()->can('roles.index') ||
                     Auth::user()->can('bitacora.index'))
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
                     @can('usuario.index')
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
                     @endcan

                     @can('roles.index')
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
                     @endcan
                     @can('bitacora.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('bitacora.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('bitacora.index') }}">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                             </svg>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Bitácora</span>
                         </a>
                     @endcan
                 @endif

                 {{-- MODULO SERVICIO --}}
                 @if (Auth::user()->can('cliente.index') ||
                     Auth::user()->can('mascota.index') ||
                     Auth::user()->can('reserva.index') ||
                     Auth::user()->can('atencion.index') ||
                     Auth::user()->can('vacuna.index') ||
                     Auth::user()->can('servicio.index'))
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
                     @can('cliente.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('cliente.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('cliente.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                 </svg>

                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Clientes</span>
                         </a>
                     @endcan

                     @can('mascota.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('mascota.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('mascota.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                 </svg>
                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Mascotas</span>
                         </a>
                     @endcan

                     @can('reserva.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('reserva.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('reserva.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                 </svg>
                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Reservas</span>
                         </a>
                     @endcan

                     @can('atencion.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('atencion.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('atencion.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                                 </svg>

                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Atenciones</span>
                         </a>
                     @endcan

                     @can('vacuna.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('vacuna.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('vacuna.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M15 11.25l1.5 1.5.75-.75V8.758l2.276-.61a3 3 0 10-3.675-3.675l-.61 2.277H12l-.75.75 1.5 1.5M15 11.25l-8.47 8.47c-.34.34-.8.53-1.28.53s-.94.19-1.28.53l-.97.97-.75-.75.97-.97c.34-.34.53-.8.53-1.28s.19-.94.53-1.28L12.75 9M15 11.25L12.75 9" />
                                 </svg>

                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Vacunas</span>
                         </a>
                     @endcan

                     @can('servicio.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('servicio.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('servicio.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                 </svg>

                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Servicios</span>
                         </a>
                     @endcan
                 @endif

                 {{-- MODULO COMPRA Y VENTA --}}
                 @if (Auth::user()->can('producto.index') ||
                     Auth::user()->can('proveedor.index') ||
                     Auth::user()->can('nota_compra.index') ||
                     Auth::user()->can('nota_venta.index'))
                     <h1 class="flex items-center space-x-2 font-bold" :class="{ 'justify-center': !isSidebarOpen }">
                         <span :class="{ 'hidden': isSidebarOpen }">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">COMPRA / VENTA</span>
                     </h1>

                     @can('producto.index')
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
                     @endcan

                     @can('proveedor.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('proveedor.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('proveedor.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                 </svg>
                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Proveedores</span>
                         </a>
                     @endcan

                     @can('nota_compra.index')
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
                     @endcan

                     @can('nota_venta.index')
                         <a class="flex items-center p-2 space-x-2 rounded-md hover:bg-sky-600 @if (request()->routeIs('nota_venta.index')) bg-sky-800 @endif "
                             :class="{ 'justify-center': !isSidebarOpen }" href="{{ route('nota_venta.index') }}">
                             <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                 </svg>

                             </span>
                             <span :class="{ 'lg:hidden': !isSidebarOpen }">Ventas</span>
                         </a>
                     @endcan
                 @endif

             </li>
         </ul>
     </nav>
 </aside>
