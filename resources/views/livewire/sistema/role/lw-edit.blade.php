<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Roles') }}
    </h2>

    <x-card>
        <div class="flex items-center justify-center px-6 py-4">
            <div class="mx-auto w-full ">

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <x-label-input>
                                Nombre
                            </x-label-input>
                            <input type="text" name="name" placeholder="Nombre" wire:model.defer="name"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            <x-jet-input-error for="name" />
                        </div>
                    </div>
                </div>


                <div class="w-full px-3">
                    <div class="mb-5">
                        <x-label-input>
                            Permisos
                        </x-label-input>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($permisosDB as $key => $permission)
                                <label>
                                    <input wire:model.defer='permisosV.{{ $key + 1 }}' type="checkbox"
                                        class="px-2 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600"
                                        value="{{ $permission->id }}">
                                    {{ $permission->description }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="-mx-3 px-3 py-4 flex items-center">
                    <div class="flex items-center">
                        <x-button-link route="roles.index">
                            {{ __('Volver') }}
                        </x-button-link>
                        <x-jet-button wire:click='add()'>
                            Guardar
                        </x-jet-button>
                    </div>
                </div>

            </div>
        </div>
    </x-card>
</div>
