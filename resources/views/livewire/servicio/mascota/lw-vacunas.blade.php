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
                    Fecha
                </th>
                <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                    Observaciones
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($vacunas as $vacuna)
                <tr>
                    <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                        {{ $vacuna->id }}
                    </td>
                    <td class="px-6 py-2 text-sm text-gray-900 font-bold">
                        {{ $vacuna->vacuna->nombre }}
                    </td>
                    <td class="px-6 py-2 text-sm">
                        {{ $vacuna->fecha }}
                    </td>
                    <td class="px-6 py-2 text-sm">
                        {{ $vacuna->observacion ? $vacuna->observacion : 'Sin observaciones' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-pagination :modelo='$vacunas'> </x-pagination>
</div>
