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
        Schema::create('travailler', function (Blueprint $table) {
            $table->string('VIS_MATRICULE', 10);
            $table->dateTime('JJMMAA');
            $table->string('REG_CODE', 2);
            $table->string('TRA_ROLE', 11);
            $table->primary(['VIS_MATRICULE', 'JJMMAA', 'REG_CODE']);
            $table->foreign('VIS_MATRICULE')->references('VIS_MATRICULE')->on('visiteur');
            $table->foreign('REG_CODE')->references('REG_CODE')->on('region');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travailler');
    }
};
