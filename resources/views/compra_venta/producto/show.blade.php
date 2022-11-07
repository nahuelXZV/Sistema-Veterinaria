<x-plantilla>
    {{-- Mostrar datos de una producto en una card --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Productos') }}
    </h2>

    <x-card>
        {{-- Botones de la cabezera --}}
        <div class="px-5 py-3 flex items-center">
            <div class="flex items-center mr-2">
                <a href="{{ route('producto.index') }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Volver') }}
                </a>
                <a href="{{ route('producto.edit', $producto->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Editar') }}
                </a>
            </div>
        </div>

        {{-- h1 con el texto de datos de la producto --}}
        <h1 class="text-2xl font-bold text-leaf m-4 lg:text-center">Datos del producto</h1>

        {{-- inputs con los datos de la producto readonly --}}
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Nombre') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $producto->nombre }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Tipo') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="cliente" id="cliente"
                    value="{{ $producto->tipo }}" readonly />
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Precio') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $producto->precio }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Cantidad') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="especie" id="especie"
                    value="{{ $producto->cantidad }}" readonly />
            </div>
        </div>

        @if ($producto->fecha_vencimiento)
            <div class="flex items-center">

                <div class="flex-1 px-6 py-4 flex items-center">
                    <x-jet-label class="w-32" for="nombre" value="{{ __('Fecha vencimiento') }}" />
                    <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="fecha_nacimiento"
                        id="fecha_nacimiento" value="{{ $producto->fecha_vencimiento }}" readonly />
                </div>
                <div class="flex-1 px-6 py-4 flex items-center">

                </div>
            </div>
        @endif

        @if ($producto->descripcion)
            <div class="px-6 py-4 items-center">
                <x-jet-label class="w-full mb-2" for="nombre" value="{{ __('Descripcion') }}" />
                <textarea class="form-textarea mt-1 block w-full" rows="5" readonly>{{ $producto->descripcion }}</textarea>
            </div>
        @endif

    </x-card>


</x-plantilla>
