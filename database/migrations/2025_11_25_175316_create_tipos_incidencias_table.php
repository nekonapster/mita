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
        Schema::create('tipos_incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('codigo')->unique();
            $table->boolean('afecta_pago')->default(false);
            $table->text('descripcion')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_incidencias');
    }
};
