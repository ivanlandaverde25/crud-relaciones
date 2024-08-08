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
                'origen' => 'Marvel',
                'villanosVencidos' => ['Villano 1', 'Villano 2', 'Villano 3'],
            ],
            [
                'nombre' => 'DeadPool',
                'origen' => 'Marvel',
                'villanosVencidos' => ['Villano 4', 'Villano 5', 'Villano 6'],
            ],
            [
                'nombre' => 'Wolverin',
                'origen' => 'DC',
                'villanosVencidos' => ['Villano 7', 'Villano 8', 'Villano 9'],
            ],
            [
                'nombre' => 'Superman',
                'origen' => 'DC',
                'villanosVencidos' => ['Villano 10', 'Villano 11', 'Villano 12'],
            ],
        ];

        // Variable para prueba de Switch
        $dia = 3;

        // ariable para prueba de for
        $cantidad = 10;

        return view('pruebas.index', compact('heroes', 'dia', 'cantidad'));
    }
}
