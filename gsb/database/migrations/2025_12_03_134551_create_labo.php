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
        Schema::create('labo', function (Blueprint $table) {
            $table->string('LAB_CODE', 2)->primary();
            $table->string('LAB_NOM', 10);
            $table->string('LAB_CHEFVENTE', 20);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labo');
    }
};
