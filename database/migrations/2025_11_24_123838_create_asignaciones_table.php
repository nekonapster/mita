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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('turno_id')
                  ->constrained('turnos')
                  ->cascadeOnDelete();

            $table->foreignId('empleado_id')
                  ->constrained('empleados')
                  ->cascadeOnDelete();

            $table->string('tipo')->default('planificado');
            
            $table->foreignId('creado_por')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->text('observaciones')->nullable();

            $table->timestamps();
            
            // 🔒 Evita duplicados y segurar que un empleado no pueda ser asignado al mismo turno más de una vez
            $table->unique(['turno_id', 'empleado_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
