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
        Schema::create('prescrire', function (Blueprint $table) {
            $table->string('MED_DEPOTLEGAL', 10);
            $table->string('TIN_CODE', 5);
            $table->string('DOS_CODE', 10);
            $table->string('PRE_POSOLOGIE', 40);
            $table->primary(['MED_DEPOTLEGAL', 'TIN_CODE', 'DOS_CODE']);
            $table->foreign('MED_DEPOTLEGAL')->references('MED_DEPOTLEGAL')->on('medicament');
            $table->foreign('TIN_CODE')->references('TIN_CODE')->on('type_individu');
            $table->foreign('DOS_CODE')->references('DOS_CODE')->on('dosage');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescrire');
    }
};
