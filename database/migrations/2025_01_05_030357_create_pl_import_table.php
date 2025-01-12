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
        Schema::create('pl_import', function (Blueprint $table) {
            $table->id('imp_id');
            $table->enum('imp_act',['0','1'])->default('1');
            $table->string('imp_label');    ##### Identificador del ejemplar (número de colecta o nùmero de clavo)
            $table->string('imp_camellon'); ##### Texto del nombre del camellón
            $table->decimal('imp_x',13,10); ##### Coordenadas X del ejemplar dentro del camellòn
            $table->decimal('imp_y',13,10); ##### Coordenadas Y del ejemplar dentro del camellòn

            $table->integer('imp_comunidad')->default('1')->nullable(); ##### indicador del número de especies a registrar con la misma ficha (si >1 tons poner nombres separados por coma)
            $table->string('imp_ramet')->default('1')->nullable(); ##### En caso de ser clonal, número de individuos que lo conforman; si multiple>1, separar por comas

            $table->string('imp_sciname')->nullable(); ##### Texto del nombre científico
            $table->string('imp_comname')->nullable(); ##### Texto del nombre común
            $table->string('imp_obsejemplar')->nullable(); ##### Texto de observaciones del ejemplar
            $table->string('imp_obsubica')->nullable(); ##### Texto de observaciones sobre la ubicación del ejemplar
            $table->string('imp_obscaptura')->nullable(); ##### Texto de observaciones sobre la captura de datos del ejemplar
            $table->string('imp_fotolugar')->nullable(); ##### Texto de ubicación de la foto de ubicaciòn del ejemplar
            $table->string('imp_foto1')->nullable(); ##### Texto de ubicación de la foto del ejemplar
            $table->string('imp_foto2')->nullable(); ##### Texto de ubicación de la foto del ejemplar
            $table->string('imp_foto3')->nullable(); ##### Texto de ubicación de la foto del ejemplar
            $table->string('imp_foto4')->nullable(); ##### Texto de ubicación de la foto del ejemplar
            $table->string('imp_foto5')->nullable(); ##### Texto de ubicación de la foto del ejemplar
            $table->date('imp_date')->nullable(); ##### Fecha de captura de informaciòn
            $table->integer('imp_flag1')->nullable(); ###### Flag opcional para el usuario
            $table->integer('imp_flag2')->nullable(); ###### Flag opcional para el usuario
            $table->integer('imp_flag3')->nullable(); ###### Flag opcional para el usuario
            $table->integer('imp_flag4')->nullable(); ###### Flag opcional para el usuario
            $table->integer('imp_flag5')->nullable(); ###### Flag opcional para el usuario

            $table->string('imp_kew')->nullable(); ##### Número id de kew (en caso de haberse determinado el nombre con kew)
            $table->integer('imp_iconid')->nullable(); ##### Referencia al ícono seleccionado

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_import');
    }
};
