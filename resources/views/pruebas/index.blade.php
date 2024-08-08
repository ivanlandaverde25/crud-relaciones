<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<style>
    .color-red{
        color: red;
    }

    .color-green{
        color: green;
    }
</style>
<body>
    {{-- Por medio de la directiva includeIf, podemos agregar otras vistas blade a nuestro codigo para hacer referencia, y en el caso que no exista no la mostrara --}}
    @includeIf('pruebas.header', [
        'nombre' => 'pruebas'
    ])

    La directiva includeWhen, sirve para agregar una vista nueva cuando cumple cierta condicion
    @includeWhen( false,'pruebas.header')
    
    <h1>Aqui hacemos todas las pruebas</h1>

    {{-- La directiva unless espera por defecto un valor false --}}
    @unless (false)
        Hola papito, soy falso
    @endunless
    <br>
    {{$prueba . ' ' . $prueba2}}
    <br>

    {{-- La directiva @isset,  sirve para validar si una variable esta definida, y saber si tiene algun valor asignado dentro del codigo --}}
    {{-- Dentro de esta directiva se puede utilizar el else tambien --}}
    @isset($prueba3)
        La variable esta difinida y tiene el valor de: {{$prueba}}  
    @else
        La variable no esta definida papito
    @endisset

    {{-- La directiva empty, sirve para validar si existe una varaible o validar si tiene un valor nulo dentro del codigo --}}
    <br>
    @empty($record)
        La varaible no existe o tiene un valor nulo
    @endempty

    {{-- EJEMPLO DE CONDICIONAL SWITCH --}}
    <br>
    <h2>EJEMPLO DE CONDICIONAL SWITCH</h2>
    @switch($dia)
        @case(1)
            <p>Dia lunes pa</p>
        @break
        @case(2)
            <p>Dia martes pa</p>
        @break
        @case(3)
            <p>Dia miercoles pa</p>
        @break
        @case(4)
            <p>Dia jueves pa</p>
        @break
        @case(5)
            <p>Dia viernes pa</p>
        @break
        @default
            <p>Fin de semana pa</p>
    @endswitch

    <h1>DIRECTIA FOR</h1>
    <ul>
        @for ($i = 0; $i < $cantidad; $i++)
            <li>
                Valor N°: {{$i + 1}}    
            </li>    
        @endfor
    </ul>

    <h1>DIRECTIVA WHILE</h1>
    <ul>
        @php
         $m = 1;   
        @endphp
        @while ($m <= $cantidad)
            <li>
                Este es el registro N° {{$m}} usando un bucle while 
                @php
                    $m++;
                @endphp
            </li>    
        @endwhile
    </ul>

    <h1>DIRECTIVA CONTINUE Y BREAK</h1>
    {{-- Directiva continue --}}
    {{-- Esta directiva se utiliza para saltar alguna condicional que se cumpla dentro de estro codigo --}}
    @for ($i = 1; $i <= $cantidad; $i++)
        @if ($i  % 3 == 0)
            @continue;
        @endif

        @if ($i == 8)
            <p>El bucle se cierra porque el valor de i es 8</p>
            @break;
        @endif
        <p>El numero {{$i}} no es multiplo de 3</p>
    @endfor


    {{-- Variable $loop --}}
    <h1>Variable $loop</h1>
    <ul>
        @foreach ($heroes as $heroe)
            <li>
                {{-- La directiva @class sirve para colocar clases de estilos de manera dinamica dentro del codigo AJUUUU🤠 --}}
                <h2 @class([
                    'color-red' => $loop->first,
                    'color-green' => $loop->last
                ])>
                    {{-- Variable para saber la iteracion por la cual se va en el bucle --}}
                    {{ $loop->iteration }}
                    {{$heroe['nombre'];}}

                    {{-- Variable para saber si se va en la primera iteracion --}}
                    @if ($loop->first)
                    - Primera iteracion
                    @endif
                    
                    {{-- Variable para saber si se va en la ultima iteracion --}}
                    @if ($loop->last)
                        - Ultima iteracion
                    @endif

                </h2>
                <h3>
                    {{$heroe['origen'];}}
                </h3>
                <h3>
                    Villanos vencidos:
                </h3>
                <ul>
                    @foreach ($heroe['villanosVencidos'] as $villanoVencido)
                        <li>
                            {{ $villanoVencido }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>


    <h1>DIRECTIVAS PARA CAMPOS CHECKBOX</h1>
    <p>La directiva @ checked para los campos de tipo checkbox, sirve para poder asignar valores por defecto al campo</p>
    <h2>Seleccione sus heroes favoritos</h2>
    <label>
        <input type="checkbox" @checked(false) name="superheroes[]" id="">
        Iron Man
    </label>
    <label>
        <input type="checkbox" @checked(true) name="superheroes[]" id="">
        Pantera Negra
    </label>
    <label>
        <input type="checkbox" @checked(false) name="superheroes[]" id="">
        Ant Man
    </label>
    <label>
        <input type="checkbox" @checked(false) name="superheroes[]" id="">
        Capitan America
    </label>
    
    <h1>DIRECTIVAS PARA CAMPOS CHECKBOX</h1>
    <p>La directiva @ selected para los campos de tipo select, sirve para poder asignar un valor por defecto al campo</p>
    <h2>Seleccione su villano no preferido</h2>
    <select name="villanos">
        <option value="1">Thanos</option>
        <option value="1">Ultron</option>
        <option value="1" @selected(true)>Venom</option>
    </select>













    {{-- Scripts js --}}
    <script>
        // Esta es una forma
        // let heroes = {!! json_encode($heroes) !!};

        // Tambien se puede hacer por medio de la directiva blade @jason() de la cual se realiza de manera mas facil
        let heroes = @json($heroes);
        const heroName = heroes.map((hero) => {
            return hero.nombre;
        });
        console.log(heroes);
        console.log(heroName);
    </script>
</body>
</html>