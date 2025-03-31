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
        if(!Schema::hasTable('cat_iconos')){
            Schema::create('cat_iconos', function (Blueprint $table) {
                $table->id('icon_id');
                $table->string('icon_name');
                $table->string('icon_nombre');
                $table->string('icon_coleccion')->default('web'); ##### colección a la que pertenece (planta, web, etcc)
                $table->string('icon_file');
                $table->string('icon_sizex')->nullable();
                $table->string('icon_sizey')->nullable();
                $table->string('icon_col1')->nullable();
                $table->string('icon_col2')->nullable();
                $table->string('icon_descripcion')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_iconos');
    }
};
