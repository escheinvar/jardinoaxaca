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
        if(!Schema::hasTable('cat_camellones')){
            Schema::create('cat_camellones', function (Blueprint $table) {
                $table->id('cam_id');
                $table->foreignId('cam_ccamid')->constrained('cat_campus','ccam_id');
                $table->string('cam_camellon')->unique(); ### Nombre corto del camellón
                $table->string('cam_zona')->nullable(); ### zona en la que está el camellòn
                $table->string('cam_zonaname')->nullable();; ### Nombre de la zona en la que está
                $table->string('cam_camellonname')->nullable();; ### Nombre largo del camellón en la que está
                $table->string('cam_color')->nullable();;   #### Color del camellòn
                $table->string('cam_notas')->nullable();     ### notas sobre la zona
                $table->json('cam_mapa')->nullable();     #### Json del polígono del camellón
                $table->decimal('cam_ctrox',13,10)->nullable()->default('-96.72211246391984'); ### Coordenadas X del centro del polígono (para visualizar en leaflet)
                $table->decimal('cam_ctroy',13,10)->nullable()->default('17.06588524915741'); ### Coordenadas Y del centro del polígono (para visualizar en leaflet)
                $table->integer('cam_zoom')->nullable()->default('20'); ### Zoom inicial del mapa (para visualizar en leaflet)
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_camellones');
    }
};
