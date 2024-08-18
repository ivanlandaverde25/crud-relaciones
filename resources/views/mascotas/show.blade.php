<x-prueba-template class="total">

    <x-slot name="title">
        Mascota
    </x-slot>

    <h1 class="font-bold">Aqui vemos el detalle de la mascota seleccionada</h1>
    <br>

    {{-- Contenedor para botones --}}
    <div class="flex flex-row justify-end rounded-lg" style="width: 100%; border: 2px solid gray; padding: 10px 10px;">
        {{-- Boton para regresar al listado --}}
            <button class="focus:outline-none w-40 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            type="button"
            onclick="location.href='{{route('mascotas.index')}}'">
                Regresar al listado
            </button>
            <br>
    
        {{-- Boton para editar el registro --}}
            <button class=" text-white w-40 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" 
            type="button" 
            onclick="location.href='{{route('mascotas.edit', $mascota)}}'">
                Editar registro
            </button>

        {{-- Boton para eliminar el registro --}}
        <form id="eliminarRegistro" action="{{route('mascotas.destroy', $mascota)}}" method="POST">
            @csrf
            @method('DELETE')
            <button id="delete" class="w-40 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" 
            type="button">
                Eliminar registro
            </button>
        </form>
    </div>

    {{-- Detalles de la mascota --}}
    <ul>
        <li>
            <b>Nombre de la macota:</b>
            {{$mascota->nombre}}
        </li>
        <li>
            <b>Tipo:</b> 
            {{$mascota->tipo}}
        </li>
        <li>
            <b>Edad:</b> 
            {{$mascota->edad}}
        </li>
        <li>
            <b>Fecha de nacimiento:</b> 
            {{$mascota->fecha_nacimiento->format('d/m/Y')}}
        </li>
        <li>
            <b>Sexo:</b> 
            {{$mascota->sexo}}
        </li>
    </ul>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            
            const boton = document.getElementById('delete');
            const form = document.getElementById('eliminarRegistro');

            boton.addEventListener('click', () => {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: "Eliminar registro?",
                        text: "Desea eliminar este registro?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Si, eliminar",
                        cancelButtonText: "No, cancelar",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire({
                                title: "Registro eliminado",
                                text: "El registro ha sido eliminado",
                                icon: "success"
                            });
                            form.submit();
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "El registro no ha sido eliminado",
                            icon: "error"
                            });
                        }
                    });
            });
        });

    </script>
</x-prueba-template>