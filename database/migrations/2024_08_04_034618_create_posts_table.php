<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('categoria');

            // $table->unsignedBigInteger('id_categoria');     // Para los valores que sean lalves foraneas se crean del tipo unsignedBigInteger
            // $table->foreign('id_categoria')              // Luego de eso se establece la relacion
            //     ->references('id')                  // Campo de la otra tabla hacia el cual se hace referencia
            //     ->on('categorias')                       // Tabla a la que se hace referencia
            //     ->onDelete('cascade')               // Al realizar la accion de eliminar, eliminar todos los registros relacionados a este mismo
            //     ->onUpdate('cascade'); 

            $table->text('contenido', 2500);
            $table->boolean('publicado')->default(false);
            $table->date('fecha_publicacion')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            // Para asignar la llave primaria a un campo sin que este sea autoincrementable, se usa el metodo ->primery
            // $table->primary('campo');

            // Y si se desea que este sea autoincrementable, se usa el metodo ->autoIncrement
            // $table->autoIncrerement('campo');

            // Cuando se desea cambiar el valor o un atributo de una tabla, se utiliza el metodo ->change al final de la tabla (IMPORTANTE SABER  QUE SI TIENE ALGUIEN OTRO MODIFICADOR MAS, SE DEBE AGREGAR NEUVAMENTE)
            // $table->longText('campo')->unique()->change();

            // Cuando se desea cambiar de nombre una tabla, se utiliza el metodo ->renameColumn
            // $table->renameColumn('campo');

            // Para crear un indice lo hacemos por medio del metodo ->index
            // $table->index('campo');

            // No se pa que sirven los indices fullText, pero se crean por medio del metodo ->fullText
            // $table->fullText('campo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');

        // En el caso de los campos que se agregan de mas, se eliminan
        // $table->dropColumn('campo');
    }
};
