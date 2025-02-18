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
        Schema::create('sp_cedulas', function (Blueprint $table) {
            $table->id('ced_id');
            $table->enum('ced_act',['0','1'])->default('1'); ##### Borrado lógico
            $table->foreignId('ced_url')->constrained('sp_url','url_id'); ##### texto de la url

            $table->string('ced_clencode');
            $table->foreign('ced_clencode')->references('clen_code')->on('cat_lenguas')->onDelete('cascade')->constrained('clen_code','cat_lenguas');

            $table->foreignId('ced_jardin')->constrained('cat_jardines','cjar_id'); ##### Id del jardín al que pertenece la cédula

            $table->enum('ced_titulo',['0','1'])->default('0'); ##### Indica si es título (h4) ò solo es código
            $table->decimal('ced_order',6,2)->default('0.0');  ##### Número de orden del párrafo
            $table->longText('ced_codigo')->nullable(); ##### Código html del párrafo
            $table->string('ced_audio')->nullable();    ##### nombre del archivo de audio
            $table->string('ced_autor')->nullable();     ##### id del autor del párrafo

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_cedulas');
    }
};
