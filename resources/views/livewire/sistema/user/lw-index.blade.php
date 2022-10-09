<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4 ">
        {{ __('Usuarios') }}
    </h2>
    <x-card>
        <div class="px-6 py-4 flex items-center">
            {{-- 3 botones juntos --}}

            <div class="flex items-center mr-2">

                <x-button-link route="usuario.create">
                    {{ __('Nuevo') }}
                </x-button-link>
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
                            Correo
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Cargo
                        </th>
                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                                {{ $user->id }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-2 text-sm">
                                {{ $user->getRoleNames()->implode(' ') }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap flex">
                                <x-button-link-post route='usuario.edit' id='{{ $user->id }}'>
                                    <x-edit />
                                </x-button-link-post>
                                <form action="{{ route('usuario.delete', $user->id) }}" method="POST"
                                    style="display: inline-block;" onsubmit="return confirm('¿Está seguro?')">
                                    @csrf
                                    @method('DELETE')
                                    <x-button-delete>
                                        <x-delete />
                                    </x-button-delete>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-pagination :modelo='$users'> </x-pagination>
        </div>
    </x-card>
</div>
