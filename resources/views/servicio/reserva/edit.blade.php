<x-plantilla>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Reservas') }}
    </h2>

    <x-card>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">

                @if (session('fecha_validate'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('fecha_validate') }}</span>
                    </div>
                    <br>
                @endif

                <form method="POST" action="{{ route('reserva.update', $reserva->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Cliente*
                                </x-label-input>
                                <input type="text" value="{{ $reserva->cliente->nombre }}" readonly
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Estado*
                                </x-label-input>
                                <select
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    name="estado">
                                    <option disabled>Seleccione un estado</option>
                                    <option value="Pendiente" {{ $reserva->estado == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente</option>
                                    <option value="Atendido" {{ $reserva->estado == 'Atendido' ? 'selected' : '' }}>
                                        Atendido</option>
                                    <option value="Cancelado" {{ $reserva->estado == 'Cancelado' ? 'selected' : '' }}>
                                        Cancelado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Fecha*
                                </x-label-input>
                                <input type="date" name="fecha_atencion" value="{{ $reserva->fecha_atencion }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('fecha_atencion')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <x-label-input>
                                    Hora*
                                </x-label-input>
                                <input type="time" name="hora_atencion" min="08:00" max="18:00" step="3600"
                                    value="{{ $reserva->hora_atencion }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('hora_atencion')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="-mx-3 px-3 py-4 flex items-center">
                        <div class="flex items-center">
                            <a href="{{ route('reserva.index') }}"
                                class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                                {{ __('Volver') }}
                            </a>
                            <x-jet-button>
                                Guardar
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-plantilla>
