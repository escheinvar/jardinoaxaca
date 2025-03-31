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
        if(!Schema::hasTable('pl_fotos')){
            Schema::create('pl_fotos', function (Blueprint $table) {
                $table->id('img_id');
                $table->foreignId('img_plid')->constrained('pl_plantas','pl_id');  ##### ID de tabla pl_plantas
                $table->enum('img_act',['0','1'])->default('1'); ##### Borrado lógico

                $table->string('img_file');  ##### Texto con la ubicación del archivo de imágen
                $table->foreignId('img_label')->constrained('cat_fotoplantaslabel','cimg_id');  ##### ID del label de la foto
                $table->string('img_autor')->nullable(); ##### Texto con el nombre del autor de la imagen
                $table->string('img_titulo')->nullable(); ##### Texto con el nombre del tìtulo de la imagen
                $table->date('img_date')->nullable(); ##### Fecha de la imagen
                $table->string('img_descrip')->nullable(); ##### Breve texto con descripción de la imagen
                $table->string('img_metadata')->nullable(); ##### Array con punto y coma de metadatos de la foto.

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_fotos');
    }
};
