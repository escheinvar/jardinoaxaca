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
        if(!Schema::hasTable('pl_clavos_georeferencia_copy1')){
            Schema::create('pl_clavos_georeferencia_copy1', function (Blueprint $table) {
                $table->id('cl_id2');
                $table->foreignId('cl_colectas_idcolectas')->constrained('pl_clavos_colectas_copy1','cl_idcolectas');
                $table->integer('cl_altitud')->nullable();
                $table->decimal('cl_latitud',12,9)->nullable();

                // $table->decimal('cl_longitud',12,8)->nullable();
                $table->string('cl_longitud')->nullable();

                $table->string('cl_procedencia')->nullable();
                $table->string('cl_municipio')->nullable();
                $table->string('cl_distritos')->nullable();
                $table->string('cl_nombre_region')->nullable();
                $table->string('cl_nombre_estado')->nullable();
                $table->string('cl_provincia_fisografica')->nullable();
                $table->string('cl_area_protegida')->nullable();
                $table->string('cl_iluminacion')->nullable();
                $table->string('cl_topografia')->nullable();
                $table->string('cl_exposicion')->nullable();
                $table->string('cl_suelo')->nullable();
                $table->string('cl_clima_zona')->nullable();
                $table->decimal('cl_ph',2,1)->nullable();
                $table->string('cl_temperatura')->nullable();
                $table->string('cl_textura')->nullable();
                $table->string('cl_color')->nullable();
                $table->string('cl_pedregosidad')->nullable();
                $table->string('cl_abundancia_zona')->nullable();
                $table->string('cl_vegetacion_zona')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('pl_clavos_georeferencia_copy1');
    }
};
