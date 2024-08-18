<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = new Mascota();
        $mascotas = Mascota::orderBy('id', 'DESC')
            ->paginate();

        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMascotaRequest $request)
    {
        // $request->validate([

        // ]);
        // Validando los campos
        Mascota::create($request->all());

        return redirect()->route('mascotas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'slug'              => "required|string|min:2|max:255|unique:mascotas,slug,{$mascota->id}",
            'nombre'            => 'required|string|min:2|max:255',
            'tipo'              => 'required|string',
            'edad'              => 'required|integer|min:0|max:25',
            'fecha_nacimiento'  => 'required|date',
            'sexo'              => 'required|string',
        ]);

        $mascota->update($request->all());
        return redirect()->route('mascotas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index');
    }
}
