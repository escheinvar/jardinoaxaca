<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('reporte_boletos_view', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::statement("
            CREATE VIEW lenguas_view AS (
                SELECT
                'ethnologue' as base, clen_id as id, clen_lengua as lengua, clen_code as code, clen_localidad as localidad, clen_altnames as nombres, clen_autonimias as autonimia
                FROM cat_lenguas

                UNION

                SELECT
                'Inali' as base, clen2_id as id, clen2_lengua as lengua, clen2_code as code, clen2_localidad as localidad, clen2_lengua as nombres, clen2_autonimia as autonimia
                FROM cat_lenguas_inali
            )
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('reporte_boletos_view');
        DB::statement('DROP VIEW IF EXISTS lenguas_view CASCADE');
    }
};
