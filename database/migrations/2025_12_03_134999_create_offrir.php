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
        Schema::create('offrir', function (Blueprint $table) {
            $table->string('VIS_MATRICULE', 10);
            $table->foreign('VIS_MATRICULE')->references('VIS_MATRICULE')->on('visiteur');
            $table->foreign('RAP_NUM')->references('RAP_NUM')->on('rapport_visite');
            $table->foreign('MED_DEPOTLEGAL')->references('MED_DEPOTLEGAL')->on('medicament');
            $table->unsignedInteger('RAP_NUM');
            $table->string('MED_DEPOTLEGAL', 10);
            $table->smallInteger('OFF_QTE')->nullable();
            $table->primary(['VIS_MATRICULE', 'RAP_NUM', 'MED_DEPOTLEGAL']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offrir');
    }
};
