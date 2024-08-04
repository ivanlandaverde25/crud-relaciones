<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Al registrar dentro de este archivo las validaciones con expresiones regulares, se applican para todos los valores dentro de todo el proyecto
        Route::pattern('id', '[0-9]+');

        // Metodo para cambiar las rutas de ingles a español, para las funciones que se mecionan como create o update
        // Route::resourceVerbs([
        //     'create' => 'crear',
        //     'edit' => 'editar',
        // ]);
    }
}
