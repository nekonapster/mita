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
        Schema::create('necesidades_servicio', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proyecto_id')
                  ->constrained('proyectos')
                  ->cascadeOnDelete();

            $table->foreignId('categoria_profesional_id')
                  ->constrained('categorias_profesionales')
                  ->cascadeOnDelete();

            $table->foreignId('actividad_id')
                  ->nullable()
                  ->constrained('actividades')
                  ->nullOnDelete();

            $table->unsignedInteger('dia_semana'); // 1 a 7 (Lunes a Domingo)
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unsignedTinyInteger('cantidad_personas');
            $table->text('observaciones')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necesidades_servicio');
    }
};
