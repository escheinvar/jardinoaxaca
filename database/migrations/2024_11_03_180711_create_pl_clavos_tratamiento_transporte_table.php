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
        // Schema::create('pl_clavos_tratamiento_transporte', function (Blueprint $table) {
        //     $table->id('cl_id3');
        //     $table->foreignId('cl_colectas_copy1_idcolectas')->constrained('pl_clavos_colectas_copy1','cl_idcolectas');
        //     $table->string('cl_personas_recolectar')->nullable();
        //     $table->date('cl_fecha_inicio')->nullable();
        //     $table->date('cl_fecha_corte')->nullable();
        //     $table->date('cl_fecha_tratamiento')->nullable();
        //     $table->date('cl_fecha_embalaje')->nullable();
        //     $table->date('cl_fecha_extraccion')->nullable();
        //     $table->string('cl_tipo_extraccion')->nullable();
        //     $table->date('cl_fecha_carga_envio')->nullable();
        //     $table->string('cl_tipo_vehiculo')->nullable();
        //     $table->date('cl_fecha_llegada')->nullable();
        //     $table->date('cl_fecha_descarga')->nullable();
        //     $table->longText('cl_observaciones')->nullable();
        //     $table->string('cl_nombre_responsable_tecnico')->nullable();
        //     $table->string('cl_nombre_responsable_operativo')->nullable();

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('pl_clavos_tratamiento_transporte');
    }
};
