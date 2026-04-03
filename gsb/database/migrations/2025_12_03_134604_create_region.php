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
        Schema::create('region', function (Blueprint $table) {
            $table->string('REG_CODE', 2)->primary();
            $table->string('SEC_CODE', 1);
            $table->string('REG_NOM', 50);
            $table->foreign('SEC_CODE')->references('SEC_CODE')->on('secteur');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('region');
    }
};
