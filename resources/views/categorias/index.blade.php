<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <h1>Aqui se muestra el listado de categorias listados</h1>
    {{-- <h2>{{$prueba}}</h2>
    <h2>{{$prueba2}}</h2>
    <h2>{{__('Log Out')}}</h2>
    <h2>{{__('Please click the button below to verify your email address.')}}</h2> --}}

    <br>
    <a href="{{route('categorias.create')}}">
        Crear nuevo registro
    </a>

    <br><br>

    {{-- Tabla --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$categoria->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$categoria->nombre}}
                        </td>
                        <td class="px-6 py-4">

                            {{-- Ver detalles --}}
                            <a href="{{route('categorias.show', $categoria)}}" data-tooltip-target="tooltip-default">
                                <i class="fa-regular fa-eye"></i>
                                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Tooltip content
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </a>
                            {{-- Editar --}}

                            <a href="{{route('categorias.edit', $categoria)}}" data-tooltip-target="tooltip-default">
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
        {{$categorias->links()}}
    </div>

    {{-- <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{route('posts.show', $post)}}">
                    {{$post->titulo}}
                </a>
            </li>
        @endforeach
    </ul> --}}

</body>
</html>