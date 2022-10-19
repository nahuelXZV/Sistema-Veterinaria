<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Nota de Compra') }}
    </h2>

    {{-- Header Nota --}}
    <x-card>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <x-label-input>
                                Proveedor*
                            </x-label-input>
                            <select class="w-full" wire:model.defer='header.proveedor_id'>
                                <option value="">Seleccione un proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                            @error('header.proveedor_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <x-label-input>
                                Total
                            </x-label-input>
                            <input type="text" name="" placeholder="0" readonly
                                wire:model.defer='header.monto_total'
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <x-label-input>
                            Otros
                        </x-label-input>
                        <textarea name="otros" placeholder="Otros....." rows="3" wire:model.defer='header.otros'
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    {{-- Body Nota --}}
    <x-card>
        <div class="px-6 py-4">
            <h1 class="text-2xl font-bold text-leaf m-6 lg:text-center">Productos</h1>

            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-2/5">
                    <div class="mb-5">
                        <x-label-input>
                            Producto*
                        </x-label-input>
                        <select class="w-full" wire:model.defer='producto.producto_id'>
                            <option value="">Seleccione un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                        @error('producto.producto_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/5">
                    <div class="mb-5">
                        <x-label-input>
                            Cantidad*
                        </x-label-input>
                        <input type="number" name="" placeholder="0" wire:model.defer='producto.cantidad'
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('producto.cantidad')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/5">
                    <div class="mb-5">
                        <x-label-input>
                            Precio*
                        </x-label-input>
                        <input type="text" name="" placeholder="0" wire:model.defer='producto.precio'
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('producto.precio')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- button the add --}}
                <div class="w-full px-3 text-center mb-4 sm:w-1/5">
                    <div class="mb-5">
                        <x-label-input>
                            &nbsp;
                        </x-label-input>
                        <button wire:click='addProducto()'
                            class="w-16 bg-[#6A64F1] text-white rounded-md py-2 px-4 text-base font-medium outline-none focus:shadow-md">
                            {{-- svg de + --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

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
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($lista_productos as $producto)
                        <tr>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $producto['id'] }}
                            </td>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $producto['nombre'] }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $producto['precio'] }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $producto['cantidad'] }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap flex">
                                <x-jet-button wire:click="delLista({{ $producto['id'] }})">
                                    <x-delete />
                                </x-jet-button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="-mx-3 px-3 py-4 flex items-center mb-8">
                <div class="flex items-center">
                    <a href="{{ route('nota_compra.index') }}"
                        class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                        {{ __('Volver') }}
                    </a>
                    <x-jet-button wire:click='save()'>
                        Guardar
                    </x-jet-button>
                </div>
            </div>
        </div>
    </x-card>
</div>
