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
        if(!Schema::hasTable('cat_fotoplantaslabel')){
            Schema::create('cat_fotoplantaslabel', function (Blueprint $table) {
                $table->id('cimg_id');
                $table->string('cimg_gral')->default('planta'); ##### Módulo sobre el cual se ejecutan las etiquetas
                $table->string('cimg_tipo');  ##### Tipo de etiquieta para foto (ejemplar, especie, uso, proceso)
                $table->string('cimg_name')->unique()->key();  ##### Nombre de la etiqueta ()
                $table->string('cimg_descripcion')->nullable(); ##### descripción de la etiqueta
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    {
        ##### No se puede tirar porque lo requieren  las posiciones de imágenes que se usan en las cédulas en producción.
        // Schema::dropIfExists('cat_fotoplantaslabel');
    }
};
