<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
</head>
<body>
<h1>Detalles del post</h1>
<br>

<a href="{{route('posts.index')}}">
    Regresar al listado
</a>
<br>
<a href="{{route('posts.edit', $post)}}">
    Editar registro
</a>
<br>
<form action="{{route('posts.destroy', $post)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">
        Eliminar registro
    </button>
</form>
<br><br>

<ul>
    <li><h3>Titulo: {{$post->titulo}}</h3></li>
    <li><h3>Categoria: {{$post->categoria}}</h3></li>
    <li><h3>Contenido: {{$post->contenido}}</h3></li>
    <li>
        <h3>
            Estado:
            @if ($post->publicado == 1)
            Publicado
            @else
            No publicado
            @endif
        </h3>
    </li>
    <li>
        <h3>
            Fecha de publicacion:
            @if ($post->publicado == 1 && $post->fecha_publicacion != null)
                {{$post->fecha_publicacion->format('d/m/Y')}}
            @else
                Pendiente de publicar
            @endif
            </h3>
        </li>
    </ul>
</body>
</html>