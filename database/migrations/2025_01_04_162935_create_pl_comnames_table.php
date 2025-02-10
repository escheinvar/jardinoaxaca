<?php

use App\Models\CatLenguasModel;
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
        Schema::create('pl_comnames', function (Blueprint $table) {
            $table->id('comn_id');
            $table->foreignId('comn_plid')->constrained('pl_plantas','pl_id');  ##### ID de tabla pl_plantas
            $table->enum('comn_act',['0','1'])->default('1'); ##### Borrado lógico

            $table->string('comn_nombre'); ##### Texto con el nombre

            $table->string('comn_clencode');
            $table->foreign('comn_clencode')->references('clen_code')->on('cat_lenguas')->onDelete('cascade')->constrained('clen_code','cat_lenguas');

            $table->string('comn_regiones')->nullable(); ##### Array separado por punto y coma de las zonas o regiones geográficas en las que se reconoce el nombre
            $table->integer('comn_tipo')->default('0'); ##### Número indicador de proceso de curación: 0= dato de campo, 1=corregido por técnico; 2=corregido por autoridad;

            $table->string('comn_audio1')->nullable(); ##### Texto con ubicación del archivo de audio con la pronunciación del nombre
            $table->string('comn_audio2')->nullable(); ##### Texto con ubicación del archivo de audio con la pronunciación del nombre
            $table->string('comn_video1')->nullable(); ##### Texto con ubicación del archivo de video con la pronunciación del nombre
            $table->string('comn_video2')->nullable(); ##### Texto con ubicación del archivo de video con la pronunciación del nombre

            $table->foreignId('comn_usr')->constrained('users','id');  ##### usuario que ingresó la información
            $table->string('comn_autoridad')->nullable(); ##### Texto del nombre de la autoridad que determinó el nombre
            $table->date('comn_autoriddadate')->nullable();  ###### Fecha en la que la autoridad determinó el nombre

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_comnames');
    }
};
