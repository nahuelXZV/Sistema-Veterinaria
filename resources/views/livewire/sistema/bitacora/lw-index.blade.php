<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Bitacora') }}
    </h2>
    <x-card>
        <div class="px-6 py-4 flex items-center">
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
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Acción
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Area
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            IP
                        </th>
                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                            Identificador
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($bitacoras as $bitacora)
                        <tr>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $bitacora->id }}
                            </td>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $bitacora->user->name }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $bitacora->accion }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $bitacora->tabla }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $bitacora->ip }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $bitacora->id_registro }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-pagination :modelo='$bitacoras'> </x-pagination>
        </div>
    </x-card>
</div>
