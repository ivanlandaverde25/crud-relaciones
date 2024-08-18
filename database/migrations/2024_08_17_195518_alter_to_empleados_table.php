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
        Schema::table('empleados', function (Blueprint $table) {
            // PARA ELIMINAR LAS RELACIONES ES IMPORTANTE PASARLAS DENTRO DE UN ARREGLO Y UNA RELACION UNICAMENTE
            // Eliminando relacion de tabla empleados con empresa
            // $table->dropForeign(['id_empresa']);
            // Eliminando relacion de tabla departamentos con empresa
            // $table->dropForeign(['id_departamento']);

            // Eliminando los indices
            // $table->dropIndex('empleados_id_empresa_foreign');
            // $table->dropIndex('empleados_id_departamento_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            // Creando nuevamente las relaciones
            // ES IMPORTANTE CREAR SOLO LA RELACION, EL CAMPO NO SE ELIMINA
            // Relacion de tabla empresas
            // $table->foreign('id_empresa')
            //     ->references('id_empresa')
            //     ->on('empresas')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

            // Relacion de tabla departamento
            // $table->foreign('id_departamento')
            // ->references('id_departamento')
            // ->on('departamentos')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
    }
};
