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
        // Schema::create('sp_cedulas', function (Blueprint $table) {
        //     $table->id('txt_id');

        //     $table->foreignId('txt_cedid')->constrained('sp_urlcedula','ced_id'); ##### texto de la url
        //     $table->enum('txt_act',['0','1'])->default('1'); ##### Borrado lógico
        //     $table->enum('txt_titulo',['0','1'])->default('0'); ##### Indica si es título (h4) ò solo es código
        //     $table->decimal('txt_order',6,2)->default('0.0');  ##### Número de orden del párrafo
        //     $table->longText('txt_codigo')->nullable(); ##### Código html del párrafo
        //     $table->string('txt_audio')->nullable();    ##### nombre del archivo de audio
        //     $table->string('txt_autor')->nullable();     ##### id del autor del párrafo
        //     $table->string('txt_version')->nullable()->default('0.01');   ##### Versión del párrafo

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('sp_cedulas');
    }
};
