<x-plantilla>
    {{-- validar si existe la variable id --}}
    @if (isset($id))
        @livewire('servicio.atencion.lw-create', ['id' => $id])
    @else
        @livewire('servicio.atencion.lw-create')
    @endif
</x-plantilla>
