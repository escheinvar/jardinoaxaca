<?php

use App\Models\User;
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
        Schema::create('usr_roles', function (Blueprint $table) {
            $table->id('rol_id');
            $table->enum('rol_act',['0','1'])->default('1');
            $table->foreignId('rol_usrid')->constrained('users','id');
            $table->foreignId('rol_crolid')->constrained('cat_roles','crol_id')->default('2');
            $table->string('rol_describe')->nullable()->default('base:usr');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usr_roles');
    }
};
