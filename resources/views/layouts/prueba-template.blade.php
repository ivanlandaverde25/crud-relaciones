<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{$title ?? 'Landing'}}</title>
</head>
<style>
    .total{
        min-height: 100vh;
        display: flex;
        flex-flow: column nowrap;
        justify-content: space-between;
    }
</style>
<body>
    {{-- Contenedor principal --}}
    <div 
    {{$attributes->merge([
        'class' => ' container mx-auto'
    ])}}>

        {{-- Menu --}}
        @includeIf('components.nav')
        {{-- <x-nav>
    
        </x-nav> --}}
        
        {{-- Contenido --}}
        {{$slot ?? 'Contenido eff'}}
        
        @includeIf('components.footer')
        {{-- <x-footer>

        </x-footer> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>