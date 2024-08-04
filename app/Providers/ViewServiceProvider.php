<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Por este medio se puede compartir variables de manera global en todas las vistas sin necesidad de declararlas en los controladores
        // Asi se realiza para compartir varaibles entre todas las vistas
        View::share([
            'prueba' => 'Me duele',
            'prueba2' => 'El mero fundillo',
        ]);

        // Asi se realiza para detallar a que vistas se desea compartir las varaibles especificas
        View::composer('welcome', function ($view){
            $view->with('prueba3', 'Este es un mensaje de prueba 3 ALV');
        });

    }
}
