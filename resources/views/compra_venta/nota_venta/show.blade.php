<x-plantilla>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Nota de Venta') }}
    </h2>

    {{-- Header Nota --}}
    <x-card>
        <div class="px-5 py-3 flex items-center">
            <div class="flex items-center mr-2">
                <a href="{{ route('nota_venta.index') }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Volver') }}
                </a>
                <a href="{{ route('nota_venta.edit', $nota->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Editar') }}
                </a>
            </div>
        </div>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <x-label-input>
                                Cliente
                            </x-label-input>
                            {{-- input --}}
                            <input type="text" name="" placeholder="0" readonly
                                value="{{ $nota->nombre_cliente }}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <x-label-input>
                                Monto Total
                            </x-label-input>
                            <input type="text" name="" placeholder="0" readonly
                                value="{{ $nota->monto_total }}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <x-label-input>
                            Otros
                        </x-label-input>
                        <textarea name="otros" placeholder="Otros....." rows="5" readonly
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $nota->otros }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    {{-- Body Nota --}}
    <x-card>
        <div class="px-6 py-4 mb-8">
            <h1 class="text-2xl font-bold text-leaf m-6 lg:text-center">Productos</h1>
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
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Subtotal
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($lista_productos as $producto)
                        <tr>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $producto->producto ? $producto->producto->id : 'N/A' }}
                            </td>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $producto->producto ? $producto->producto->nombre : 'N/A' }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $producto->producto ? $producto->producto->tipo : 'N/A' }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $producto->precio }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $producto->cantidad }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $producto->precio * $producto->cantidad }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                        </td>
                        <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                        </td>
                        <td class="px-6 py-2 text-sm">
                        </td>
                        <td class="px-6 py-2 text-sm">
                        </td>
                        <td class="px-6 py-2 text-sm font-bold"">
                            TOTAL
                        </td>
                        <td class="px-6 py-2 text-sm">
                            {{ $nota->monto_total }} Bs.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-card>
</x-plantilla>
