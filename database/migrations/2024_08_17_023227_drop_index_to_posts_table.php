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
            // Para elilminar un indice dentro de una tabla se realiza por medio del metodo ->dropIndex
            // $table->dropIndex('nombreDeLaRestriccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // En el caso como se elimina la condicion, se debe volver a agregar en el metodo down
            // $table->unique('campo');
        });
    }
};
