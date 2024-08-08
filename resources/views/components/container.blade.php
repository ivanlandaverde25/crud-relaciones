{{-- Para los componentes anonimos, como en este caso no tenemos una clase, se reciben por medio de props --}}
{{-- Cada una de estas propiedades puede ser inicializada con un valor por defecto por si el componente anonimo no lo trae --}}
@props([
    'width' => '7xl',
])

@php
    switch ($width) {
        case '7xl':
            $width = 'max-w-7xl';
            break;
            
        case '4xl':
            $width = 'max-w-4xl';
            break;
            
        default:
            $width = 'max-w-7xl';
            break;
    }
@endphp

{{-- Al momento de concatenar clases, es importante dejar los espacios para que reconozca las clases --}}
<div {{$attributes->merge([
    'class' => $width . ' mx-auto px-4 py-4 sm:px-6 lg:px-8',
])}}>
    {{$slot}}
</div>