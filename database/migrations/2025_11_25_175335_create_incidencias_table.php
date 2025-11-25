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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')
                  ->constrained('empleados')
                  ->cascadeOnDelete();
            
            $table->foreignId('turno_id')
                  ->nullable()
                  ->constrained('turnos')
                  ->cascadeOnDelete();
            
            $table->foreignId('proyecto_id')
                  ->constrained('proyectos')
                  ->cascadeOnDelete();  

            $table->foreignId('tipos_incidencia_id')
                  ->constrained('tipos_incidencias')
                  ->cascadeOnDelete();

            $table->foreignId('coordinador_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->dateTime('fecha_hora')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('gravedad')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
