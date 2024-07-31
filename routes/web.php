<?php

use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/', function () {
    return view('welcome');
});

// Ruta de prueba para ingresar registros
Route::get('/pruebas', function () {
    
    // $user = User::create([
    //     'name' => 'Ivan Mendoza',
    //     'email' => 'ivan@gmail.com',
    //     'password' => bcrypt('12345678'),
    // ]);

    // Relacion principal
    // por medio del metodo hasOne(Model::class)
    $user = User::where('id', 1)
        ->with('phone')
        ->get();
    return $user;
});

Route::get('/phone', function () {

    // Relacion Inversar metodo belongsTo(Model::class)
    $phone = Phone::find(1)
    ->with('user')
    ->get();

    return $phone;
});

Route::get('/listados/{listado}', function ($listado) {
    return "Holaaaa $listado";
})
->whereAlphaNumeric('listado')
->whereIn('listado', ['php', 'laravel']);