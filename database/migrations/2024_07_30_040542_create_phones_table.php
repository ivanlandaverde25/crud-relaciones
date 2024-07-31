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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('number');               
            // $table->unsignedBigInteger('user_id');     // Para los valores que sean lalves foraneas se crean del tipo unsignedBigInteger
            // $table->foreign('user_id')              // Luego de eso se establece la relacion
            //     ->references('id')                  // Campo de la otra tabla hacia el cual se hace referencia
            //     ->on('users')                       // Tabla a la que se hace referencia
            //     ->onDelete('cascade')               // Al realizar la accion de eliminar, eliminar todos los registros relacionados a este mismo
            //     ->onUpdate('cascade');              // Al realizar la accion de actualizar, actualizar todos los registros relacionados a este mismo
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropColumns('user_id');
        Schema::dropIfExists('phones');
    }
};
