<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Aqui retornamos el listado de post creados en la base';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Formulario para crear un nuevo post';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Aqui se almacenar el post dentro del sistema';
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        return "Aqui retornamos los datos del post {$post}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        return "Aqui vamos a editar los datos de un post existente: {$post}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        return "Aqui se guardaran los datos actualizados de un post existente: {$post}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        return "Aqui se eliminara un post {$post}";
    }
}
