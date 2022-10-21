<div class="px-6 py-4 flex items-center">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="rounded-3xl bg-blue-700 text-white">
            <tr>
                <th scope="col" class="w-32 px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                    Código
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                    Reserva
                </th>
                <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($atenciones as $atencion)
                <tr>
                    <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                        {{ $atencion->id }}
                    </td>
                    <td class="px-6 py-2 text-sm">
                        {{ $atencion->created_at->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-2 text-sm">
                        {{ $atencion->reserva ? $atencion->reserva->codigo : 'Sin Reserva' }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap flex">
                        <a href="{{ route('atencion.show', $atencion->id) }}"
                            class='mr-1 px-2 py-1 inline-flex items-center  bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition'>
                            <x-show />
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-pagination :modelo='$atenciones'> </x-pagination>
</div>
