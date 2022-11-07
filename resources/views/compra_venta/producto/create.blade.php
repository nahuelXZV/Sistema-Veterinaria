<x-plantilla>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Productos') }}
    </h2>

    <x-card>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">
                <form method="POST" action="{{ route('producto.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Nombre*
                                </x-label-input>
                                <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('nombre')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Tipo*
                                </x-label-input>
                                <div class="flex items-center">
                                    <input type="radio" name="tipo" value="Producto"
                                        class="form-radio h-5 w-5 text-[#6A64F1] focus:ring-[#6A64F1] border-gray-300 rounded">
                                    <span class="ml-2 text-gray-700 mr-4">Producto</span>

                                    <input type="radio" name="tipo" value="Medico"
                                        class="form-radio h-5 w-5 text-[#6A64F1] focus:ring-[#6A64F1] border-gray-300 rounded">
                                    <span class="ml-2 text-gray-700 mr-4">Medico</span>

                                    <input type="radio" name="tipo" value="Accesorio"
                                        class="form-radio h-5 w-5 text-[#6A64F1] focus:ring-[#6A64F1] border-gray-300 rounded">
                                    <span class="ml-2 text-gray-700">Accesorio</span>
                                </div>
                                @error('tipo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Precio*
                                </x-label-input>
                                <input type="text" name="precio" placeholder="Precio" value="{{ old('precio') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('precio')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Cantidad*
                                </x-label-input>
                                <input type="number" name="cantidad" placeholder="Cantidad" min="0"
                                    value="{{ old('cantidad') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('cantidad')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Fecha Vencimiento
                                </x-label-input>
                                <input type="date" name="fecha_vencimiento"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('fecha_vencimiento')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                            </div>
                        </div>
                    </div>

                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3">
                            <x-label-input>
                                Descripción
                            </x-label-input>
                            <textarea name="descripcion" placeholder="Descripcion....." rows="3"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                        </div>
                    </div>

                    <div class="-mx-3 px-3 py-4 flex items-center">
                        <div class="flex items-center">
                            <x-jet-button class="mr-1">
                                Guardar
                            </x-jet-button>
                            <a href="{{ route('producto.index') }}"
                                class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                                {{ __('Volver') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-plantilla>
