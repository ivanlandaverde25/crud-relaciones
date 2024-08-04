<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Aqui se muestra el formulario para editar el post</h1>
    <a href="{{route('posts.index')}}">
        Rergresar al listado
    </a>
    <br>

    <a href="{{route('posts.show', $post)}}">
        Regresar al registro
    </a>
    <br><br>

    {{-- Aqui se muestran los errores --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <h2>Detalles</h2>

    <form method="POST" action="{{route('posts.update', $post)}}">
        @csrf
        @method('PUT')

        <div class="">
            <label for="">Titulo</label>
            <input type="text" name="titulo" id="" value="{{old('titulo', $post->titulo)}}" placeholder="Titulo del post">
        </div>
        <br>

        <div class="">
            <label for="">Contenido</label>
            <textarea name="contenido" style="color: #333333;" {{old('contenido', $post->contenido)}} placeholder="Detalle del post">
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
            <input type="text" name="slug" id="" value="{{old('slug', $post->slug)}}">
        </div>
        <br>

        <button type="submit">
            Editar post
        </button>
    </form>
</body>
</html>