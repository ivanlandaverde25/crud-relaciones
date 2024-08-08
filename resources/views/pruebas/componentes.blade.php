<x-app-layout>

    <x-slot name="title">
        Listado Principal
    </x-slot>

    @php
        $type = 'success';
    @endphp

    <x-container width="7xl">
        {{-- Cuando se pasan atributos a un componente se puede hacer por medio de dos puntos al comienzo cuando se pasen valores por medio de varaibles php --}}
        <x-alert :type="$type" class="mb-32">
            {{-- Se pueden pasar n cantidad de slot a los componentes por medio de slots con nombre --}}
            {{-- Estos slot con nombre se detalla de la siguiente manera --}}
            <x-slot name="title">
                Alerta poderosa
            </x-slot>
    
            {{-- Todo lo que se escriba fuera de un slot con nombre, se toma como el slot principal --}}
            Hola paps
        </x-alert>
        <p>
            Hola de nuevo paps
        </p>
    </x-container>
</x-app-layout>