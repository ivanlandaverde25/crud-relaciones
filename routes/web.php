<?php

use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta de prueba para ingresar registros
Route::get('/pruebas', function () {
    
    $user = User::create([
        'name' => 'Ivan Mendoza',
        'email' => 'ivan@gmail.com',
        'password' => bcrypt('12345678'),
    ]);

    return "Usuario creado {$user}";
});

Route::get('phone', function () {

    $phone = Phone::create([
        'number' => '2548-9615',
        'user_id' => 1,
    ]);

    return "Registro ingresado {$phone}";
});