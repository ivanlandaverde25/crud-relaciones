<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PruebaController;
use App\Models\Empresa;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Rule\Parameters;

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

// La validacion del valor id, se realiza dentro del archivo AppServiceProvider, donde se coloca por medio de expresiones regulares que el valor id puede tomar solo valores numericos
// Route::get('/listados/{id}', function ($id) {
//     return "Holaaaa $id";
// });

// Ejemplo de validaciones de expresiones regulares desde la creacion de las rutas
Route::resource('/phones', PhoneController::class)
    ->parameters(['phones' => 'phone'])
    ->names('phones')
    ->whereAlphaNumeric('phone')
    ->except(['create', 'show']);



// Rutas para posts
// Ruta para crear un post por medio del metodo resource
Route::resource('/posts', PostController::class)
    ->parameters(['posts' => 'post'])
    ->names('posts');

// Rutas creadas por medio de un grupo de rutas
// Route::controller(PostController::class)->prefix('posts')->name('posts.')->group(function ($post) {
//     // Ruta para listar
//     Route::get('/', 'index')->name('index');

//     // Ruta para crear
//     Route::get('/create', 'create')->name('create');

//     // Ruta para guardar
//     Route::post('/', 'store')->name('store');

//     // Ruta para mostrar
//     Route::get('/{post}', 'show')->name('show');

//     // Ruta para editar
//     Route::get('/{post}/edit', 'edit')->name('edit');

//     // Ruta para actualizar
//     Route::put('/{post}', 'update')->name('update');

//     // Ruta para eliminar
//     Route::delete('/{post}', 'destroy')->name('destroy');
// });

// Rutas para el mantenimiento de categorias
Route::resource('/categorias', CategoriaController::class)
    ->parameters(['categorias' => 'categoria'])
    ->names('categorias');

// Ruta para pruebas
Route::get('/pruebas', PruebaController::class);

Route::get('/componentes', function(){
    return view('pruebas.componentes');
});

Route::get('/landing', function(){
    return view('pruebas.landing');
});

Route::get('/listados', function(){
    return view('pruebas.listado');
});

// Rutas para mascotas
Route::resource('/mascotas', MascotaController::class)
    ->Parameters(['mascotas' => 'mascota'])
    ->names('mascotas');

Route::get('/empresas', function(){
    // Con el metodo select, trae solo los datos indicados pero siempre dentro de un arreglo
    // $empresa = DB::table('empresas')
    //             ->select('id_empresa','name')
    //             ->get();

    // El metodo pluck, retorna el valor indicado pero dentro de un objeto solamente
    // $empresa = DB::table('mascotas')
    //                 ->pluck('nombre', 'id')
    //                 ->get();

    // El metodo chunk, sirve para porcesar grandes cantidades de registros y traerlos de poco a poco, para no sobrecargar la memoria del sistema
    // $empresa = DB::table('mascotas')
    //                 ->orderBy('id', 'ASC')
    //                 ->chunk(100, function($mascotas){
    //                     foreach($mascotas as $mascota){
    //                         echo $mascota->id . ' - ' . $mascota->nombre . '<br>';
    //                     }
    //                 });

    // El metodo lazy, es similar al chunck, con la unica diferencia que se pueden iterar sin necesidad de un bucle foraech definido literalmente
    // $empresa = DB::table('mascotas')
    //                 ->orderBy('id', 'ASC')
    //                 ->lazy()->each(function($mascota){
    //                     echo $mascota->id . ' - ' . $mascota->nombre . '<br>';
    //                 });

    $empresaTotalRegistros = DB::table('mascotas')->count();
    $empresaMaxRegistro = DB::table('mascotas')->max('id');
    $empresaMinRegistro = DB::table('mascotas')->min('id');
    $empresaSumaEdad = DB::table('mascotas')->sum('edad');
    $idRegistro = 50;
    $existenciaRegistro = '';

    if (DB::table('mascotas')->where('id', '=', $idRegistro)->exists()){
        $existenciaRegistro = "El registro con id {$idRegistro} si existe dentro de la base de datos";
    } else {
        $existenciaRegistro = "El registro con id {$idRegistro} NO existe dentro de la base de datos";
    }

    $respuestas = [
        'El total de registros en la tabla es: ' . $empresaTotalRegistros,
        'El registro con mayor valor dentro de la tabla es: ' . $empresaMaxRegistro,
        'El registro con menor valor dentro de la tabla es: ' . $empresaMinRegistro,
        'La sumatoria de edades de todas las mascotas es: ' . $empresaSumaEdad,
        $existenciaRegistro,
    ];

    $query = DB::select("SELECT 
                        CONCAT(nombre, ' - ', tipo)
                        FROM mascotas WHERE id = " . $idRegistro);

    // El meotodo WhereRaw, sirve para ejecutar sentencias where con SQL puro
    $query2 = DB::table('mascotas')
                ->whereRaw('id = 5')
                ->get();

    // return 'Total de registros: ' . $empresa;
    return $query2;

    return 'Total de registros: ' . $empresa;
});

// Rutas para las especialidades
Route::resource('/especialidades', EspecialidadController::class)
->parameters(['especialidades' => 'especialidad']) 
->names('especialidades');

Route::post('/especialidades/{especialidad}', [EspecialidadController::class, 'especialidadFavorito'])
    ->name('especialidades.favorito');

Route::get('/especialidadesDeshabilitadas', [EspecialidadController::class, 'especialidadesDeshabilitadas'])
    ->name('especialidades.deshabilitadas');
