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
        Schema::table('posts', function (Blueprint $table) {
           
            // Para renombrar una columna, primero se debe instalar el siguiente paquete desde la terminal
            // composer require doctrine/dbal

            // Luego de haberlo instalado, asi se renombra una nueva columna
            // $table->renameColumn('contenido', 'cuerpo');
            // Asi se eliminan las columnas
            // $table->dropColumn('contenido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->renameColumn('cuerpo', 'contenido');

            // En el caso que se elimine, se tiene que volver a crear
            // $table->string('contenido',);
        });
    }
};
