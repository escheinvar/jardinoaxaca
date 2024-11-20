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
        Schema::create('cat_roles', function (Blueprint $table) {
            $table->id('crol_id');
            $table->string('crol_mod')->default('base');     ### nombre del módulo al que pertenece el rol
            $table->string('crol_rol');     ### nombre del rol            
            $table->string('crol_describe')->nullable(); ### texto descriptivo modulo:rol
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_roles');
    }
};
