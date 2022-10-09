<x-plantilla>
    {{-- Mostrar datos de una mascota en una card --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Mascota') }}
    </h2>

    <x-card>
        {{-- Botones de la cabezera --}}
        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center mr-2">
                <x-button-link-post route="mascota.index" id="">
                    {{ __('Volver') }}
                </x-button-link-post>
                <x-button-link-post route="mascota.edit" id="{{ $mascota->id }}">
                    {{ __('Editar') }}
                </x-button-link-post>
            </div>
        </div>

        {{-- h1 con el texto de datos de la mascota --}}
        <h1 class="text-2xl font-bold text-leaf m-4 lg:text-center">Datos de la mascota</h1>

        {{-- inputs con los datos de la mascota readonly --}}
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Nombre') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $mascota->nombre }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Dueño') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="cliente" id="cliente"
                    value="{{ $mascota->cliente->nombre }}" readonly />
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Raza') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $mascota->nombre }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Especie') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="especie" id="especie"
                    value="{{ $mascota->especie }}" readonly />
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Sexo') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $mascota->nombre }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Fecha nacimiento') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="fecha_nacimiento"
                    id="fecha_nacimiento" value="{{ $mascota->fecha_nacimiento }}" readonly />
            </div>
        </div>

        @if ($mascota->otro)
            <div class="px-6 py-4 items-center">
                <x-jet-label class="w-full mb-2" for="nombre" value="{{ __('Otros') }}" />
                <textarea class="form-textarea mt-1 block w-full" rows="3" readonly>{{ $mascota->otro }}</textarea>
            </div>
        @endif

    </x-card>

    <x-card>
        <h1 class="text-2xl font-bold text-leaf m-4 lg:text-center">Historial Clinico</h1>
        <div class="mb-32"></div>

    </x-card>


</x-plantilla>
