<x-plantilla>
    {{-- Mostrar datos de una mascota en una card --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Mascota') }}
    </h2>

    <x-card>
        {{-- Botones de la cabezera --}}
        <div class="px-5 py-3 flex items-center">
            <div class="flex items-center mr-2">
                <a href="{{ route('mascota.index') }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Volver') }}
                </a>
                <a href="{{ route('mascota.edit', $mascota->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Editar') }}
                </a>
                <a href="{{ route('mascota.vacunar', $mascota->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Vacunar') }}
                </a>
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
                    value="{{ $mascota->raza }}" readonly />
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
                    value="{{ $mascota->sexo }}" readonly />
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
        <ul class="nav nav-pills flex flex-col md:flex-row flex-wrap list-none pl-0 mb-4 mt-4" id="pills-tab3"
            role="tablist">
            <li class="nav-item" role="presentation">
                <button type="button"
                    class="active nav-link block font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 "
                    id="pills-home-tab3" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">
                    Consultas realizadas
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button type="button"
                    class="nav-link block font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 "
                    id="pills-profile-tab3" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">
                    Control de vacunas
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent3">
            <div class="tab-pane fade show active mb-4" id="pills-home" role="tabpanel"
                aria-labelledby="pills-home-tab3">
                @livewire('servicio.mascota.lw-atencion', ['id' => $mascota->id])
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab3">
                @livewire('servicio.mascota.lw-vacunas', ['id' => $mascota->id])
            </div>
        </div>
    </x-card>
</x-plantilla>
