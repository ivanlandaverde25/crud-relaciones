<x-prueba-template class="total">

    <x-slot name="title">
        Nuevo registro de Mascota
    </x-slot>

    <h1 class="font-bold">
        Crear nuevo registro de mascota
    </h1>

    <a href="{{route('mascotas.index')}}">
        Regresar al listado
    </a>
    <br><br>

    {{-- Mostrar errores de validaciones de campos --}}
    @if ($errors->any())
        <x-alert type="danger">
            <x-slot name="title">
                Campos requeridos
            </x-slot>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        <span class="text-xl">
                            <i class="fa-solid fa-circle-exclamation fa-2xs" style="color: #c41212;"></i>
                        </span>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    {{-- Formulario para la creacion del registro --}}
    <form action="{{route('mascotas.store')}}" method="POST" class="mb-5">
        @csrf

        {{-- Slug --}}
        <div class="mb-6">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Slug a mostrar:</label>
                <input type="text" name="slug" value="{{old('slug')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="slug" required />
            </div>
        </div>

        {{-- Nombre --}}
        <div class="mb-6">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nombre de la mascota:</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre" required />
            </div>
        </div>

        {{-- Tipo --}}
        <div class="mb-6">
            <div>
                <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Tipo:</label>
                <select name="tipo" value="{{old('tipo')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option @selected(true) selected>Seleccione un tipo</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Perico">Perico</option>
                    <option value="Garrobo">Garrobo</option>
                  </select>
            </div>
        </div>

        {{-- Edad --}}
        <div class="mb-6">
            <div>
                <label for="edad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Edad de la mascota:</label>
                <input type="number" name="edad" value="{{old('edad')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Edad" required />
            </div>
        </div>

        {{-- Fecha Nacimiento --}}
        <div class="mb-6">
            <div>
                <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Fecha de nacimiento de la mascota:</label>
                <input type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/aaaa" required />
            </div>
        </div>

        {{-- Sexo --}}
        <div class="mb-6">
            <div>
                <label for="sexo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nombre de la mascota:</label>
                <select name="sexo" value="{{old('sexo')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option @selected(true) selected>Seleccione el sexo de su mascota</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                  </select>
            </div>
        </div>


        {{-- Boton de envio --}}
        <button type="submit" class="mt-3 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Guardar registro
        </button>
    </form>


</x-prueba-template>