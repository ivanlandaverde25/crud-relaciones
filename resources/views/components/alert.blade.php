{{-- En los componentes, la informacion se guarda dentro del slot principal, el cual es {{$slot}} --}}
{{-- Los slot con nombre se detallan y se pueden crear n cantidad de slots --}}

{{-- La variable class donde se agregan los estilos, en este caso se genera desde el constructor del componente, donde se indica el tipo de alerta que se utilizara --}}
<div {{$attributes->merge([
    'class' => $clases,
])}} role="alert">
    <span class="font-medium">{{$title}}</span> {{$slot}}
</div>

{{$attributes}}
