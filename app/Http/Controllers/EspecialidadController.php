<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidades = new Especialidad();
        $especialidades = Especialidad::orderBy('id', 'DESC')
            ->paginate(10);

        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidad $especialidad)
    {
        //
    }

    // Metodo para agregar una especialidad a favoritos
    public function especialidadFavorito(Especialidad $especialidad, Request $request){
            $especialidad->favoritos = true;
            $especialidad->save();
            return response()->json([
                'mensaje' => 'Registro actualizado exitosamente',
            ]);
    }

    // Metodo para retornar todas las especialidades que se encuentren deshabilitadas
    public function especialidadesDeshabilitadas(){
        $especialidades = new Especialidad();
        $especialidades = Especialidad::where('activo', false)
            ->get();

            if ($especialidades){
                return response()->json($especialidades);
            } else{
                return response()->json(['error' => 'No se encontraron especialidades'], 404);
            }
    }
}
