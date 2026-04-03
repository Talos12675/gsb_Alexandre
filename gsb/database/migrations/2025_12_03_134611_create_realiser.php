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
        Schema::create('realiser', function (Blueprint $table) {
            $table->unsignedInteger('AC_NUM');
            $table->string('VIS_MATRICULE', 10);
            $table->float('REA_MTTFRAIS');
            $table->primary(['AC_NUM', 'VIS_MATRICULE']);
            $table->foreign('AC_NUM')->references('AC_NUM')->on('activite_compl');
            $table->foreign('VIS_MATRICULE')->references('VIS_MATRICULE')->on('visiteur');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realiser');
    }
};
