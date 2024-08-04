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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
