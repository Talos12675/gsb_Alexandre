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
        Schema::create('medicament', function (Blueprint $table) {
            $table->string('MED_DEPOTLEGAL', 10)->primary();
            $table->string('MED_NOMCOMMERCIAL', 25);
            $table->string('FAM_CODE', 3);
            $table->string('MED_COMPOSITION', 255);
            $table->string('MED_EFFETS', 255);
            $table->string('MED_CONTREINDIC', 255);
            $table->float('MED_PRIXECHANTILLON');
            $table->foreign('FAM_CODE')->references('FAM_CODE')->on('famille')->onUpdate('cascade')->onDelete('restrict');
        });

        // // Add foreign key to existing 'constituer' table now that 'medicament' exists
        // Schema::table('constituer', function (Blueprint $table) {
        //     $table->foreign('MED_DEPOTLEGAL')->references('MED_DEPOTLEGAL')->on('medicament');
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // // drop foreign key from 'constituer' before dropping 'medicament'
        // Schema::table('constituer', function (Blueprint $table) {
        //     // $table->dropForeign(['MED_DEPOTLEGAL']);
        // });
        Schema::dropIfExists('medicament');
    }
};
