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
        Schema::create('pl_jardinsig', function (Blueprint $table) {
            $table->id('sig_id');
            $table->foreignId('sig_plid')->constrained('pl_plantas','pl_id');  ##### ID de tabla pl_plantas
            $table->enum('sig_act',['0','1'])->default('1'); ##### Borrado lógico
            $table->foreignId('sig_camid')->constrained('cat_camellones','cam_id');  ##### ID del camellón en el que está el ejemplar
            $table->string('sig_campus');  ##### Texto del campus en el que está el ejempar (copiado de ccam_name)
            $table->decimal('sig_x',13,10); ###### Longitud. Ubicación del ejemplar en el jardín 
            $table->decimal('sig_y',13,10); ###### Latitud. Ubicación del ejemplar en el jardín

            $table->string('sig_identificador')->nullable(); ##### En caso de haberlo, identificador de campo (ej: clavo fìsico?)
            $table->string('sig_iconoforma')->nullable(); ##### Ìcono del elemento
            $table->string('sig_color1')->nullable(); ##### Color principal del ícono
            $table->string('sig_color2')->nullable(); ##### Color secundario del ícono
            $table->string('sig_notas')->nullable(); ##### En caso de haberlas, notas de su ubicación
            
            $table->enum('sig_flag1',['0','1'])->default('0'); ##### Bandera para los usuarios (para marcar el ejemplar)
            $table->enum('sig_flag2',['0','1'])->default('0'); ##### Bandera para los usuarios (para marcar el ejemplar)
            $table->enum('sig_flag3',['0','1'])->default('0'); ##### Bandera para los usuarios (para marcar el ejemplar)
            $table->enum('sig_flag4',['0','1'])->default('0'); ##### Bandera para los usuarios (para marcar el ejemplar)
            $table->enum('sig_flag5',['0','1'])->default('0'); ##### Bandera para los usuarios (para marcar el ejemplar)

            $table->foreignId('sig_usr')->constrained('users','id');  ##### usuario que georeferenció el ejemplar
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_jardinsig');
    }
};
