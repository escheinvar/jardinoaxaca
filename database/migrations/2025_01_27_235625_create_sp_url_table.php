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
        Schema::create('sp_url', function (Blueprint $table) {
            $table->id('url_id');
            $table->enum('url_act',['0','1'])->default('1');
            $table->string('url_url')->unique()->key();  ###### Nombre de URL (sin espacios, ñ ni acentos)
            $table->string('url_nombre')->nullable(); ##### Texto que aparece al público
            $table->enum('url_reino',['pl','an','fu','pr','mo','ar','none'])->default('pl');  ##### Indica el reino: plantae, animalia, fungi, protista, monera, arquea, ninguno (para áreas o temas)
            $table->integer('url_sp')->nullable(); ##### Id del taxon de la cédula (según reino, plantae=kew_taxonid)
            $table->longText('url_nombrecomun')->nullable(); ##### Array con nombres comunes separados por punto y coma
            $table->string('url_sciname')->nullable(); ##### Nombre científico (para mostrar al público)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_url');
    }
};
