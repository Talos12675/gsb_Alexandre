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
        Schema::create('visiteur', function (Blueprint $table) {
            $table->string('VIS_MATRICULE', 10)->primary();
            $table->string('VIS_NOM', 25)->nullable(false);
            $table->string('Vis_PRENOM', 50)->nullable();
            $table->string('VIS_ADRESSE', 50)->nullable();
            $table->string('VIS_CP', 5)->nullable();
            $table->string('VIS_VILLE', 30)->nullable();
            $table->dateTime('VIS_DATEEMBAUCHE')->nullable();
            $table->string('SEC_CODE', 1)->nullable();
            $table->string('LAB_CODE', 2)->nullable();
            $table->foreign('SEC_CODE')->references('SEC_CODE')->on('secteur');
            $table->foreign('LAB_CODE')->references('LAB_CODE')->on('labo');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiteur');
    }
};
