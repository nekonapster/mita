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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_programa'); // nombre del programa o proyecto

            $table->foreignId('cliente_id')
                  ->constrained('clientes')
                  ->cascadeOnDelete();
                  
            $table->foreignId('instalacion_id')
                  ->constrained('instalaciones')
                  ->cascadeOnDelete();  
            
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->json('dias_habiles')->nullable(); // ejemplo: ["L", "M", "X", "J", "V"]
            $table->time('hora_inicio_global')->nullable();
            $table->time('hora_fin_global')->nullable();
            $table->string('estado')->default('borrador'); // borrador, activo, finalizado
            $table->text('observaciones')->nullable();
            $table->json('extra_data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
