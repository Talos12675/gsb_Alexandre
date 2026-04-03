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
        Schema::create('posseder', function (Blueprint $table) {
            $table->unsignedSmallInteger('PRA_NUM');
            $table->string('SPE_CODE', 5);
            $table->string('POS_DIPLOME', 10);
            $table->float('POS_COEFPRESCRIPTION');
            $table->primary(['PRA_NUM', 'SPE_CODE']);
            $table->foreign('PRA_NUM')->references('PRA_NUM')->on('praticien');
            $table->foreign('SPE_CODE')->references('SPE_CODE')->on('specialite');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posseder');
    }
};
