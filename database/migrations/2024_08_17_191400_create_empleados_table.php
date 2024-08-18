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
        Schema::create('departamentos', function (Blueprint $table){
            $table->bigIncrements('id_departamento');
            $table->string('nombre_departamento');
            $table->timestamps();
        });
        
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            // Las llaves foraneas se pueden crear de esta forma, donde dentro del metodo contrained, se agrega primero la tabla a la cual se hace referencia y luego el campo
            // Llave foranea para la empresa
            $table->foreignId('id_empresa')
                ->constrained('empresas', 'id_empresa')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Llave foranea para el departamento
            $table->foreignId('id_departamento')
                ->constrained('departamentos', 'id_departamento')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Este campo se crea manual para crear una llave foranea y luego se agregan las demas restricciones
            // $table->unsignedBigInteger('id_empresa');
            $table->string('primero_nombre', 40);
            $table->string('segundo_nombre', 40);
            $table->string('primer_apellido', 40);
            $table->string('segundo_apellido', 40);
            $table->date('fecha_nacimiento');
            $table->timestamps();
            
            // Llaves foraneas
            // $table->foreign('id_empresa')
            //     ->references('id_empresa')
            //     ->on('empresas')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('departamentos');
    }
};
