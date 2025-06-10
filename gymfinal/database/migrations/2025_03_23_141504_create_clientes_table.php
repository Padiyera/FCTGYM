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
            $table->string('nombre', 50);
            $table->string('apellidos', 100);
            $table->string('telefono', 15);
            $table->string('dni', 20)->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_caducidad');
            $table->unsignedBigInteger('tipo_cuota');
            $table->timestamps();


            $table->foreign('tipo_cuota')->references('id')->on('cuotas')->onDelete('cascade');
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