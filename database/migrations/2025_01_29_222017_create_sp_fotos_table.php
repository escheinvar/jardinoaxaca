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
        Schema::create('sp_fotos', function (Blueprint $table) {
            $table->id('imgsp_id');
            $table->foreignId('imgsp_url')->constrained('sp_url','url_id');  ##### ID de tabla pl_plantas
            $table->enum('imgsp_act',['0','1'])->default('1'); ##### Borrado lógico

            $table->string('imgsp_file');  ##### Texto con la ubicación del archivo de imágen
            $table->foreignId('imgsp_label')->constrained('cat_fotoplantaslabel','cimg_id');  ##### ID del label de la foto
            $table->string('imgsp_autor')->nullable(); ##### Texto con el nombre del autor de la imagen
            $table->string('imgsp_titulo')->nullable(); ##### Texto con el nombre del tìtulo de la imagen
            $table->date('imgsp_date')->nullable(); ##### Fecha de la imagen
            $table->string('imgsp_descrip')->nullable(); ##### Breve texto con descripción de la imagen
            $table->string('imgsp_metadata')->nullable(); ##### Array con punto y coma de metadatos de la foto.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_fotos');
    }
};
