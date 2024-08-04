<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Creacion de un post</h1>

    {{-- Aqui se muestran los errores --}}
    <div class="">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


    <br>
    <a href="{{route('posts.index')}}">
        Regresar al listado
    </a>
    <br><br>

    <form method="POST" action="{{route('posts.store')}}">

        @csrf

        <div class="">
            <label for="">Titulo</label>
            <input type="text" name="titulo" id="" value="{{old('titulo')}}" placeholder="Titulo del post">
        </div>
        <br>

        <div class="">
            <label for="">Categoria</label>
            <select name="categoria" id="" value="{{old('categoria')}}">
                <option value="">Seleccione</option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
                    @endforeach
            </select>
        </div>
        <br>

        <div class="">
            <label for="">Contenido</label>
            <textarea name="contenido" style="color: #333333;" placeholder="Detalle del post">
                {{old('contenido')}}
            </textarea>
        </div>
        <br>

        <div class="">
            <label for="">Publicar</label>
            <input type="checkbox" name="publicado" id="" value="{{old('publicado')}}">
        </div>
        <br>

        <div class="">
            <label for="">Slug</label>
            <input type="text" name="slug" id="" value="{{old('slug')}}" placeholder="ejemplo-slug">
        </div>
        <br>

        <button type="submit">
            Crear post
        </button>
    </form>
</body>
</html>