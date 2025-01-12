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
        Schema::create('pl_plantas', function (Blueprint $table) {
            $table->id('pl_id');                        ##### Número base del ejemplar
            $table->string('pl_idcolecta')->nullable(); ##### En caso de existir, id pre-existente de colecta del ejemplar (x ej. no. de clavo)
            $table->string('pl_idjardin')->nullable();  ##### En caso de existir, id pre-existente de ejemplar de jardìn
            $table->string('pl_idherbario')->nullable();##### En caso de existir, id pre-existente de número de registro

            $table->enum('pl_act',['0','1'])->default('1'); ##### Borrado lógico$
            $table->enum('pl_coleccion',['0','1'])->default('0'); ##### Indica si pertenece a la colección (1) o es accesorio (0)
            $table->enum('pl_plantula',['0','1'])->default('1'); ##### Indica si el registro (en la fecha de ingreso, es una plántula o no)
            $table->enum('pl_fin',['0','1'])->default('0'); ##### Indica si el ejemplar deja de existir en la colección (1) o sigue existiendo (0)
            $table->string('pl_fintype')->nullable();  ##### En caso de que pl_fin=1, indica la razón por la que ya no está el ejemplar.
            $table->date('pl_findate')->nullable();  ##### En caso de que pl_fin=1, indica la fecha de fin.
            $table->string('pl_label')->nullable();  ##### En caso de requerirse, etiquetar planta separado por punto y coma (x ej. proyecto conacyth001; salida 45;)
            $table->string('pl_obs')->nullable();   ##### En caso de habrlas, observaciones sobre el ejemplar



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_plantas');
    }
};
