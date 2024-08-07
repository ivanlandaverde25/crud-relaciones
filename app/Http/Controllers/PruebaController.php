<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function __invoke()
    {
        // Arreglo para pruebas con sentencia @json en vistas
        $heroes = [
            [
                'nombre' => 'Iron man',
                'origen' => 'Marvel'
            ],
            [
                'nombre' => 'DeadPool',
                'origen' => 'Marvel'
            ],
            [
                'nombre' => 'Wolverin',
                'origen' => 'DC'
            ],
            [
                'nombre' => 'Superman',
                'origen' => 'DC'
            ],
        ];

        // Variable para prueba de Switch
        $dia = 3;

        // ariable para prueba de for
        $cantidad = 10;

        return view('pruebas.index', compact('heroes', 'dia', 'cantidad'));
    }
}
