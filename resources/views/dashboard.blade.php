<x-plantilla>
    {{-- header --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Dashboard') }}
    </h2>
    <x-card>
        <div class="px-6 py-4 flex items-center">
            {{-- 3 botones juntos --}}
            <div class="flex items-center">
                <x-jet-button class="mr-1">
                    <a href="{{ route('dashboard') }}">Volver</a>
                </x-jet-button>
                <x-jet-button class="mr-1">
                    <a href="{{ route('dashboard', ['status' => 1]) }}">Nuevo</a>
                </x-jet-button>
                <x-jet-button class="mr-3">
                    <a href="{{ route('dashboard', ['status' => 2]) }}">Descargar</a>
                </x-jet-button>
            </div>
            <x-jet-input type="text" class="flex-1 rounded-md shadow-sm"
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
                            Calle
                        </th>
                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900 font-bold">
                            1
                        </td>
                        <td class="px-6 py-4 text-sm">
                            cultura
                        </td>
                        <td class="px-6 py-4 text-sm">
                            no se
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex">
                            <a class="text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4">
                                <x-edit />
                            </a>
                            <a class="ml-2 text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4">
                                <x-delete />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900 font-bold">
                            1
                        </td>
                        <td class="px-6 py-4 text-sm">
                            cultura
                        </td>
                        <td class="px-6 py-4 text-sm">
                            no se
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex">
                            <a class="text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4">
                                <x-edit />
                            </a>
                            <a class="ml-2 text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4">
                                <x-delete />
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </x-card>
</x-plantilla>
