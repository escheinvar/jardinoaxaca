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
        if(!Schema::hasTable('pl_scinames')){
            Schema::create('pl_scinames', function (Blueprint $table) {
                $table->id('scn_id');
                $table->foreignId('scn_plid')->constrained('pl_plantas','pl_id');  ##### ID de tabla pl_plantas
                $table->enum('scn_act',['0','1'])->default('1'); ##### Borrado lógico
                $table->foreignId('scn_ckewtaxonid')->nullable()->constrained('cat_kew_plantsoftheworld','ckew_taxonid');  ##### ID de tabla de nombre científico de kew if =0, tons no kew
                $table->integer('scn_tipo')->default('0');  ##### Tipo de nombre: 0=campo, 1=kew, 2=tecnico-jardín, 3=herbario, 4-autoridad1, 5 autoridad2;

                $table->string('scn_fam')->nullable();  ##### Texto de la familia
                $table->string('scn_gen')->nullable();  ##### Texto del género
                $table->string('scn_sp')->nullable();  ##### Texto de la especie
                $table->string('scn_ssp')->nullable();  ##### Texto de categoría sub especìfica
                $table->string('scn_nombre')->nullable();   ##### Texto del nombre científico completo

                $table->foreignId('scn_usr')->constrained('users','id');  ##### usuario que ingresó la informaciòn
                $table->string('scn_autoridad')->nullable(); ##### Texto del nombre de la autoridad que determió el nombre
                $table->date('scn_autoridaddate')->nullable();  ###### Fecha en la que la autoridad determinó el nombre

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_scinames');
    }
};
