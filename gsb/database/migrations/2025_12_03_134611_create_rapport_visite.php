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
        Schema::create('rapport_visite', function (Blueprint $table) {
            $table->string('VIS_MATRICULE', 10);
            $table->increments('RAP_NUM');
            $table->unsignedSmallInteger('PRA_NUM');
            $table->dateTime('RAP_DATE');
            $table->string('RAP_BILAN', 255);
            $table->string('RAP_MOTIF', 255);
            $table->foreign('VIS_MATRICULE')->references('VIS_MATRICULE')->on('visiteur');
            $table->foreign('PRA_NUM')->references('PRA_NUM')->on('praticien');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapport_visite');
    }
};
