<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Atenciones') }}
    </h2>
    <x-card>
        <div class="px-5 py-3 flex items-center">
            <div class="flex items-center mr-2">
                <a href="{{ route('atencion.show', $atencion->id) }}"
                    class='mr-1 px-4 py-2 inline-flex items-center  bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'>
                    {{ __('Volver') }}
                </a>
                <x-jet-button wire:click='save()'>
                    Guardar
                </x-jet-button>
            </div>
        </div>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-[#6B7280]">Datos del paciente</h3>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <x-label-input>
                                Cliente*
                            </x-label-input>
                            <x-jet-input type="text" class="w-full" value="{{ $atencion->cliente->nombre }}"
                                disabled />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <x-label-input>
                                Mascota*
                            </x-label-input>
                            <x-jet-input type="text" class="w-full" value="{{ $atencion->mascota->nombre }}"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                Peso*
                            </x-label-input>
                            <input type="text" placeholder="Peso" wire:model.defer='datos.peso'
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('datos.peso')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                Temperatura*
                            </x-label-input>
                            <input type="text" wire:model.defer='datos.temperatura' placeholder="Temperatura"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('datos.temperatura')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                FR*
                            </x-label-input>
                            <input type="text" wire:model.defer='datos.frecuencia_respiratoria' placeholder="FR"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('datos.frecuencia_respiratoria')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/4">
                        <div class="mb-5">
                            <x-label-input>
                                FC*
                            </x-label-input>
                            <input type="text" wire:model.defer='datos.frecuencia_cardiaca' placeholder="FC"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('datos.frecuencia_cardiaca')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap mb-4">
                    <div class="w-full px-3" wire:ignore>
                        <x-label-input>
                            Anamnesis
                        </x-label-input>
                        <textarea placeholder="Anamnesis....." wire:model.defer='datos.anamnesis' id="anamnesis" name="anamnesis"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $atencion->anamnesis }}</textarea>
                    </div>
                    @error('datos.anamnesis')
                        <span class="px-3 text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </x-card>
    <x-card>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">
                {{-- h3 de tratamiento --}}
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-[#6B7280]">Tratamiento</h3>
                </div>
                <div class="-mx-3 flex flex-wrap mb-4" wire:ignore>
                    <div class="w-full px-3">
                        <x-label-input>
                            Observaciones
                        </x-label-input>
                        <textarea placeholder="Observaciones....." rows="7" wire:model.defer='datos.observaciones' id="observaciones"
                            name="observaciones"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $atencion->tratamiento ? $atencion->tratamiento->observaciones : '' }}</textarea>
                        @error('datos.observaciones')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap mb-4" wire:ignore>
                    <div class="w-full px-3">
                        <x-label-input>
                            Indicaciones
                        </x-label-input>
                        <textarea placeholder="Indicaciones....." rows="7" wire:model.defer='datos.indicaciones' id="indicaciones"
                            name="indicaciones"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $atencion->tratamiento ? $atencion->tratamiento->observaciones : '' }}</textarea>
                        @error('datos.observaciones')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap mb-4" wire:ignore>
                    <div class="w-full px-3">
                        <x-label-input>
                            Otros
                        </x-label-input>
                        <textarea placeholder="Otros....." rows="3" wire:model.defer='datos.otros' id="otros" name="otros"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $atencion->otros }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
    <div class="m-8">

    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#anamnesis'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('datos.anamnesis', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#observaciones'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('datos.observaciones', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#indicaciones'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('datos.indicaciones', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#otros'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('datos.otros', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
