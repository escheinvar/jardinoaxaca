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
        if(!Schema::hasTable('pl_clavos_colectas_copy1')){
            Schema::create('pl_clavos_colectas_copy1', function (Blueprint $table) {
                $table->id('cl_idcolectas');
                $table->integer('cl_numero_clavo');
                $table->string('cl_letra')->nullable();
                $table->string('cl_comentarios')->nullable();
                $table->string('cl_recolector')->nullable();
                $table->date('cl_fecha')->nullable();
                $table->string('cl_datos_etnobotanicos')->nullable();
                $table->integer('cl_plantas_idplantas')->nullable();
                $table->string('cl_nombre_comun')->nullable();
                $table->string('cl_genero')->nullable();
                $table->string('cl_especie')->nullable();
                $table->string('cl_familia')->nullable();
                $table->string('cl_protegida')->nullable();
                $table->integer('cl_numero_salida')->nullable();
                $table->string('cl_caracteristica_raiz')->nullable();
                $table->string('cl_altura_planta')->nullable();
                $table->string('cl_dap')->nullable();
                $table->decimal('cl_diametro_tronco',8,2)->nullable();
                $table->integer('cl_diametro_raiz')->nullable();
                $table->decimal('cl_cobertura',8,2)->nullable();
                $table->decimal('cl_diametro_cepellon',8,2)->nullable();
                $table->decimal('cl_altura_cepellon',8,2)->nullable();
                $table->string('cl_estado')->nullable();
                $table->string('cl_forma_biologica')->nullable();
                $table->string('cl_conformacion_cepellon')->nullable();
                $table->string('cl_estado_fenologico')->nullable();
                $table->string('cl_ciclo_vida')->nullable();
                $table->string('cl_comentarios_de_registro')->nullable();
                $table->string('cl_tipo_raiz')->nullable();
                $table->string('cl_forma_colecta')->nullable();
                $table->string('cl_revision')->nullable();
                $table->string('cl_link')->nullable();
                $table->string('cl_usuarios_idusuarios')->nullable();
                $table->string('cl_username')->nullable();
                $table->string('cl_active')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        ##### nO BORRAR PORQUE CUESTA UN HUEVO CARGARLA DE NUEVO (DESDE ARCHIVO)
        // Schema::dropIfExists('pl_clavos_colectas_copy1');
    }
};
