<x-prueba-template class="total">
    <style>
        .titulo{
            margin: 25px 10px;
            padding: 5px 0px;
            color: #3463aa;
            font-size: 20px;
            font-weight: 600;
            border-bottom: 2px solid #3463aa;
        }

        .botones-acciones{
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border: 2px solid #dfdfdf;
            border-radius: 5px;
            padding: 10px 10px;
            margin: 0px 10px 20px 10px;
        }

        .card-especialidad{
            min-width: 95%;
            overflow: hidden;
            height: auto;
            margin: auto;
            border: 2px solid #acacac;
            border-left: 5px solid darkblue; 
            border-radius: 5px;
            box-shadow: 0px 2px 1px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 15px;
            margin-bottom: 25px;
        }

        .detalles-especialidad{
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: flex-start;
        }

        .acciones-especialidad{
            width: auto;
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-between;
            align-items: center;
            width: 15%;
        }

        .favorito{
            font-size: 20px;
            color: rgb(255, 80, 80);
        }
    </style>

    {{-- Titulo de la papgina --}}
    <x-slot name="title">
        Listado de especialidades
    </x-slot>

    {{-- Contenido de la pagina --}}
    <div class="titulo">
        <h1>Listado de especialidades activas</h1>
    </div>
    <div class="botones-acciones">
        <button type="button" id="btnHabilitarEspecialidad" class="w-48 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-md text-sm px-5 py-2.5 text-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Habilitar especialidad</button>
        <button type="button" class="w-48 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Mostrar favoritos</button>
    </div>

    {{-- Listado de especialidades --}}
    @foreach ($especialidades as $especialidad)
        <div class="card-especialidad">
            <div class="detalles-especialidad">
                <h2 class="text-lg">{{$especialidad->nombre_especialidad}}</h2>
                <h3 class="text-gray-400">{{$especialidad->nombre_corto}}</h3>
            </div>

            <div class="acciones-especialidad">
                {{-- Marcar favorito --}}
                @if ($especialidad->favoritos == true)
                    <i class="fa-solid fa-heart favorito favorito-seleccionado" data-id="{{$especialidad->id}}"></i>
                @else
                <form id="formAgregarFavorito">
                    @csrf
                    @method('PUT')
                    <button type="button">
                        <i class="fa-regular fa-heart favorito favorito-deseleccionado" data-slug="{{$especialidad->slug}}"></i>
                    </button>
                </form>
                @endif
                {{-- Editar --}}
                <button type="button" onclick="location.href='{{route('especialidades.edit', $especialidad)}}'" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:focus:ring-yellow-900">Editar</button>

            </div>
        </div>
    @endforeach

    <div class="paginacion" style="margin-bottom: 20px; padding: 0px 30px;">
        {{$especialidades->links()}}
    </div>

    {{-- Modal --}}
    <!-- Main modal -->
    <div id="default-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] min-h-full bg-gray-600 bg-opacity-65">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Terms of Service
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre de especialidad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Accion
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tablaEspecialidadesDeshabilitadas">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <label for="" id="nombreEspecialidadDeshabilitada"></label>
                                    </th>
                                    <td class="px-6 py-4">
                                        <input type="checkbox" name="" id="checkEspecialidadDeshabilitada" @checked(false)>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="btnAceptarModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I accept</button>
                    <button id="btnCerrarModal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Decline</button>
                </div>
            </div>
        </div>
    </div>
  

    {{-- Funciones javascript --}}
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            let favoritoSeleccionado = document.querySelector('.favorito-seleccionado');
            let favoritoDeseleccionado = document.querySelector('.favorito-deseleccionado');

            // modal
            let btnHabilitarEspecialidad = document.getElementById('btnHabilitarEspecialidad');
            let defaultModal = document.getElementById('default-modal');
            let btnCerrarModal = document.getElementById('btnCerrarModal');
            let nombreEspecialidadDeshabilitada = document.getElementById('nombreEspecialidadDeshabilitada');
            let tablaEspecialidadesDeshabilitadas = document.getElementById('tablaEspecialidadesDeshabilitadas');
            
            // Formulario para agregar a favorito
            let formAgregarFavorito = document.getElementById('formAgregarFavorito');
            
            btnHabilitarEspecialidad.addEventListener('click', () => {
                defaultModal.classList.remove('hidden');

                let especialidaesDeshabilitadas = fetch('/especialidadesDeshabilitadas')
                .then(response => response.json())
                .then(data => {
                        tablaEspecialidadesDeshabilitadas.innerHTML = '';
                        data.forEach((item) => {
                            let fila = document.createElement('tr');
                            fila.innerHTML = `
                            <td>${item.nombre_especialidad}</td>
                            <td><input type="checkbox" name="" id="checkEspecialidadDeshabilitada" @checked(false)></td>
                            `;
                            tablaEspecialidadesDeshabilitadas.appendChild(fila);
                        });
                    });

            });

            btnCerrarModal.addEventListener('click', () =>{
                defaultModal.classList.add('hidden');
            });
            
            // Actualizacion de registro en favoritos
            async function actualizarRegistro(id) {

                // Enviar la petición fetch
                const response = await fetch('/especialidades-favorito/'+id, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegura la protección CSRF
                    },
                    body: JSON.stringify({
                        favoritos: true
                    })
                });

                // Manejar la respuesta
                const data = await response.json();
                if (response.ok) {
                    favoritoSeleccionado.classList.remove('hidden');
                    favoritoDeseleccionado.classList.add('hidden');
                } else {
                    alert('Hubo un error al actualizar');
                }
            }

            document.querySelectorAll('.favorito-deseleccionado').forEach((button) => {
                button.addEventListener('click', () =>{
                    let id = button.getAttribute('data-slug');
                    actualizarRegistro(id);
                });
            });
        });
    </script>
</x-prueba-template>