<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Categoria;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->paginate();
        $etiqueta = "<h1>Parrafo de ejemplo para ver como funcionan los llamados de variables</h1>";
        return view('posts.index', compact('posts', 'etiqueta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = new Categoria();
        $categorias = Categoria::get();
        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // return $request;
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo' => 'required|string|min:3|max:255',
            'contenido' => 'required|string|min:10|max:2500',
            "slug' => 'required|string|min:2|max:255|unique:posts,slug,{$post->slug}",
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
