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
        Schema::create('sp_titulos', function (Blueprint $table) {
            $table->id('tit_id');
            $table->enum('tit_act',['0','1'])->default('1'); ##### Borrado lógico
            $table->integer('tit_orden');   ###### Número para ordenar la presentación de títulos
            $table->string('tit_name');    ##### texto corto del nombre del título  (para menús)
            $table->string('tit_titulo');   ##### texto del título
            $table->string('tit_descip')->nullable();  ##### Descripción de lo que debe contener el título.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_titulos');
    }
};
