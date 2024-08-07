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
        $dia = 3;
        return view('pruebas.index', compact('heroes', 'dia'));
    }
}
