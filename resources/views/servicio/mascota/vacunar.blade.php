<x-plantilla>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Mascotas') }}
    </h2>

    <x-card>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">
                <form method="POST" action="{{ route('mascota.store_vacunar') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Nombre*
                                </x-label-input>
                                <input type="text" name="nombre" placeholder="Nombre" value='{{ $mascota->nombre }}'
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                <input type="text" name='mascota_id' value='{{ $mascota->id }}' class='hidden'>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Vacuna*
                                </x-label-input>
                                <select
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    name="vacuna_id">
                                    <option value="">Seleccione una vacuna</option>
                                    @foreach ($vacunas as $vacuna)
                                        <option value="{{ $vacuna->id }}">{{ $vacuna->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('vacuna_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Fecha*
                                </x-label-input>
                                <input type="date" name="fecha"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('fecha')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3">
                            <x-label-input>
                                Observaciones
                            </x-label-input>
                            <textarea name="observacion" placeholder="Observaciones....." rows="3"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                        </div>
                    </div>

                    <div class="-mx-3 px-3 py-4 flex items-center">
                        <div class="flex items-center">
                            <x-jet-button class="mr-1">
                                Guardar
                            </x-jet-button>
                            <a href="{{ route('mascota.show', $mascota->id) }}"
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
