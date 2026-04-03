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
        Schema::create('praticien', function (Blueprint $table) {
            $table->string('PRA_NOM', 25);
            $table->string('PRA_PRENOM', 30);
            $table->string('PRA_ADRESSE', 50);
            $table->string('PRA_CP', 5);
            $table->string('PRA_VILLE', 25);
            $table->float('PRA_COEFNOTORIETE');
            $table->string('TYP_CODE', 3);
            $table->unsignedSmallInteger('PRA_NUM')->primary();
            $table->foreign('TYP_CODE')->references('TYP_CODE')->on('type_praticien');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('praticien');
    }
};
