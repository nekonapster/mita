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
        Schema::create('empleado_habilidad', function (Blueprint $table) {
            $table->foreignId('empleado_id')
                  ->constrained('empleados')
                  ->cascadeOnDelete();
            
            $table->foreignId('categoria_profesional_id')
                  ->constrained('categorias_profesionales')
                  ->cascadeOnDelete();
            
            $table->primary(['empleado_id', 'categoria_profesional_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_habilidad');
    }
};
