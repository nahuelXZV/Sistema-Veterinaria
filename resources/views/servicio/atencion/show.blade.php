<x-plantilla>
    {{-- Mostrar datos de una atencion en una card --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Atencion') }}
    </h2>

    <x-card>
        {{-- Botones de la cabezera --}}
        <div class="px-5 py-3 flex items-center">
            <div class="flex items-center mr-2">
                <a href="{{ route('atencion.index') }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Volver') }}
                </a>
                <a href="{{ route('atencion.edit', $atencion->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Editar') }}
                </a>
                <a href="{{ route('atencion.edit', $atencion->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Recibo') }}
                </a>
            </div>
        </div>

        {{-- h1 con el texto de datos de la atencion --}}
        <h1 class="text-2xl font-bold text-leaf m-4 lg:text-center">Datos generales</h1>

        {{-- inputs con los datos de la atencion readonly --}}
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Cliente') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $atencion->cliente->nombre }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Telefono') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="cliente" id="cliente"
                    value="{{ $atencion->cliente->telefono }}" readonly />
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Mascota') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $atencion->mascota->nombre }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Sexo') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="especie" id="especie"
                    value="{{ $atencion->mascota->sexo }}" readonly />
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Raza') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $atencion->mascota->raza }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Especie') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="fecha_nacimiento"
                    id="fecha_nacimiento" value="{{ $atencion->mascota->especie }}" readonly />
            </div>
        </div>

        @if ($atencion->reserva)
            <div class="flex items-center">
                <div class="flex-1 px-6 py-4 flex items-center">
                    <x-jet-label class="w-32" for="nombre" value="{{ __('Codigo Reserva') }}" />
                    <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                        value="{{ $atencion->reserva->id }}" readonly />
                </div>
                <div class="flex-1 px-6 py-4 flex items-center">
                    <x-jet-label class="w-32" for="nombre" value="{{ __('Fecha') }}" />
                    <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="fecha_nacimiento"
                        id="fecha_nacimiento" value="{{ $atencion->reserva->fecha_atencion }}" readonly />
                </div>
            </div>
        @endif

    </x-card>

    <x-card>
        <h1 class="text-2xl font-bold text-leaf m-4 lg:text-center">Datos de la atencion</h1>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full py-4">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                Peso
                            </x-label-input>
                            <input type="text" placeholder="Peso" value="{{ $atencion->peso }}" readonly
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                Temperatura
                            </x-label-input>
                            <input type="text" placeholder="Temperatura" value="{{ $atencion->temperatura }}"
                                readonly
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                Frecuencia Cardiaca
                            </x-label-input>
                            <input type="text" placeholder="FR" value="{{ $atencion->frecuencia_respiratoria }}"
                                readonly
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                Frecuencia Respiratoria
                            </x-label-input>
                            <input type="text" placeholder="FC" value="{{ $atencion->frecuencia_cardiaca }}"
                                readonly
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap px-3">
                    <x-label-input>
                        Anamnesis
                    </x-label-input>
                    {{-- mostrar el html de la variable anamnesis --}}
                    <div class="form-textarea mt-1 block w-full" rows="5" readonly>
                        {!! $atencion->anamnesis !!}
                    </div>
                </div>

                @if ($atencion->otros)
                    <div class="-mx-3 flex flex-wrap px-3 mt-2">
                        <x-label-input>
                            Otros
                        </x-label-input>
                        <div class="form-textarea mt-1 block w-full" rows="5" readonly>
                            {!! $atencion->otros !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if ($atencion->tratamiento)
            <h1 class="text-2xl font-bold text-leaf mt-4 lg:text-center">Datos del tratamiento</h1>
            <div class="flex items-center justify-center px-6 py-6 mb-6">
                <div class="mx-auto w-full ">
                    @if ($atencion->tratamiento->observaciones)
                        <div class="-mx-3 flex flex-wrap px-3">
                            <x-label-input>
                                Observaciones
                            </x-label-input>
                            <div class="form-textarea mt-1 block w-full" rows="5" readonly>
                                {!! $atencion->tratamiento->observaciones !!}
                            </div>
                        </div>
                    @endif
                    @if ($atencion->tratamiento->indicaciones)
                        <div class="-mx-3 flex flex-wrap mt-4 px-3">
                            <x-label-input>
                                Indicaciones
                            </x-label-input>
                            <div class="form-textarea mt-1 block w-full" rows="5" readonly>
                                {!! $atencion->tratamiento->indicaciones !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </x-card>
</x-plantilla>
