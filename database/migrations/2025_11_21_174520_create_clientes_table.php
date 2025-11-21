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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo')->nullable;
            $table->string('cif_nif');
            $table->string('direccion')->nullable;
            $table->string('persona_contacto')->nullable;
            $table->string('telefono')->nullable;
            $table->string('email')->nullable;
            $table->text('observaciones')->nullable;
            $table->json('extra_data')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
