<x-prueba-template class="total">
    
    <x-slot name="title">
        Listado de mascostas
    </x-slot>

    <h1 class="font-bold">Listado de mascotas registradas</h1>
    <br>

    <a href="{{route('mascotas.create')}}">
        Crear nuevo registro
    </a>
    <br><br>

    {{-- <ul>
        @foreach ($mascotas as $mascota)
            <li>
                <a href="{{route('mascotas.show', $mascota)}}">
                    {{$mascota->nombre}}
                </a>
            </li>
        @endforeach
    </ul> --}}

        {{-- Tabla --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sexo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mascotas as $mascota)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$mascota->nombre}}
                            </th>
                            <td class="px-6 py-4">
                                {{$mascota->tipo}}
                            </td>
                            <td class="px-6 py-4">
                                {{$mascota->edad}}
                            </td>
                            <td class="px-6 py-4">
                                {{$mascota->sexo}}
                            </td>
                            <td class="px-6 py-4">
    
                                {{-- Ver detalles --}}
                                <a href="{{route('mascotas.show', $mascota)}}" data-tooltip-target="tooltip-default" class="pr-3 text-xl">
                                    <i class="fa-regular fa-eye"></i>
                                    <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Tooltip content
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </a>
                                {{-- Editar --}}
    
                                <a href="{{route('mascotas.edit', $mascota)}}" data-tooltip-target="tooltip-default" class="text-xl">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Tooltip content
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </a>
    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{$mascotas->links()}}
        </div>

</x-prueba-template>