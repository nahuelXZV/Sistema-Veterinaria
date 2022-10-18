<x-plantilla>
    {{-- Mostrar datos de una mascota en una card --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Cliente') }}
    </h2>

    <x-card>
        {{-- Botones de la cabezera --}}
        <div class="px-5 py-3 flex items-center">
            <div class="flex items-center mr-2">
                <a href="{{ route('cliente.index') }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Volver') }}
                </a>
                <a href="{{ route('cliente.edit', $cliente->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Editar') }}
                </a>
            </div>
        </div>

        {{-- h1 con el texto de datos de la mascota --}}
        <h1 class="text-2xl font-bold text-leaf m-4 lg:text-center">Datos del cliente</h1>

        {{-- inputs con los datos de la mascota readonly --}}
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Nombre') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $cliente->nombre }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Direccion') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="cliente" id="cliente"
                    value="{{ $cliente->direccion }}" readonly />
            </div>
        </div>
        <div class="flex items-center">
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Telefono') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="nombre" id="nombre"
                    value="{{ $cliente->telefono }}" readonly />
            </div>
            <div class="flex-1 px-6 py-4 flex items-center">
                <x-jet-label class="w-32" for="nombre" value="{{ __('Correo') }}" />
                <x-jet-input class="flex-1 rounded-md shadow-sm" type="text" name="especie" id="especie"
                    value="{{ $cliente->correo }}" readonly />
            </div>
        </div>

        @if ($cliente->otros)
            <div class="px-6 py-4 items-center">
                <x-jet-label class="w-full mb-2" for="nombre" value="{{ __('Otros') }}" />
                <textarea class="form-textarea mt-1 block w-full" rows="3" readonly>{{ $cliente->otros }}</textarea>
            </div>
        @endif

    </x-card>

    <x-card>
        <div class="px-6 py-4 mb-8">
            <h1 class="text-2xl font-bold text-leaf m-6 lg:text-center">Mascotas</h1>
            {{-- Table of products --}}
            <table class="mb-4 min-w-full divide-y divide-gray-200">
                <thead class="rounded-3xl bg-blue-700 text-white">
                    <tr>
                        <th scope="col" class="w-32 px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Sexo
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Raza
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Especie
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($mascotas as $mascota)
                        <tr>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $mascota->id }}
                            </td>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $mascota->nombre }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $mascota->sexo }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $mascota->raza }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $mascota->especie }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap flex">
                                <a href="{{ route('mascota.show', $mascota->id) }}"
                                    class='mr-1 px-2 py-1 inline-flex items-center  bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition'>
                                    <x-show />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>
</x-plantilla>
