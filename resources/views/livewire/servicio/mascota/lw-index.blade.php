<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Mascotas') }}
    </h2>
    <x-card>
        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center mr-2">
                <a href="{{ route('mascota.create') }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Nuevo') }}
                </a>
            </div>

            <x-jet-input type="text" class="flex-1 rounded-md shadow-sm" wire:model.lazy="attribute"
                placeholder="Escriba lo que esta buscando...." />
        </div>
        <div class="px-6 py-4 flex items-center">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="rounded-3xl bg-blue-700 text-white">
                    <tr>
                        <th scope="col" class="w-32 px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Dueño
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Raza
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Especie
                        </th>
                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
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
                                {{ $mascota->cliente }}
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
                                <form action="{{ route('mascota.delete', $mascota->id) }}" method="POST"
                                    class='inline-flex items-center  bg-red-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition'
                                    onsubmit="return confirm('¿Está seguro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class='px-2 py-1 inline-flex items-center bg-red-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition'>
                                        <x-delete />
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-pagination :modelo='$mascotas'> </x-pagination>
        </div>
    </x-card>
</div>
