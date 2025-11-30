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
        Schema::create('ausencias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('empleado_id')
                  ->constrained('empleados')
                  ->cascadeOnDelete();  
            
            $table->string('tipo'); // luego se mapea a enum
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();  
            $table->boolean('es_asuntos_propios')->default(false);
           
            $table->foreignId('proyecto_id')
                  ->nullable()
                  ->constrained('proyectos')
                  ->nullOnDelete();
           
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ausencias');
    }
};
