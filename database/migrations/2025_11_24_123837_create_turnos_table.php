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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proyecto_id')
                  ->constrained('proyectos')
                  ->cascadeOnDelete();

            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');

            $table->foreignId('instalacion_id')
                  ->constrained('instalaciones')
                  ->cascadeOnDelete();

            $table->foreignId('actividad_id')
                  ->nullable()
                  ->constrained('actividades')
                  ->cascadeOnDelete();
                  
            $table->foreignId('categoria_profesional_id')
                  ->nullable()
                  ->constrained('categorias_profesionales')
                  ->cascadeOnDelete();
                  
            $table->foreignId('necesidad_servicio_id')
                  ->nullable()
                  ->constrained('necesidades_servicio')
                  ->cascadeOnDelete();

            $table->string('estado')->default('planificado');
            $table->text('observaciones')->nullable();
                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
