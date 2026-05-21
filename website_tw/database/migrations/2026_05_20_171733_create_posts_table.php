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

            $table->string('titulo');
            $table->date('fecha'); //Formato YYYY-MM-DD
            // user_id, toma direcamente el id de la tabla user.
            $table->foreignID('user_id')->constrained()->onDelete('cascade');
            $table->text('detalle');
            $table->string('ubicacion');

            $table->string('estado')->default('Por validar');
            
            // Vamos a permitir que haya incidencias sin fotos?
            $table->string('foto');
            $table->string('info_img')->nullable();

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
