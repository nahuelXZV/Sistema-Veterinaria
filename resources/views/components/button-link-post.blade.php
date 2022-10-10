{{-- recibir la ruta --}}
@props(['route', 'id'])
<a href="{{ route($route, $id) }}"
    class='mr-1 px-2 py-1 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
    {{ $slot }}
</a>
