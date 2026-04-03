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
        Schema::create('type_praticien', function (Blueprint $table) {
            $table->string('TYP_CODE', 3)->primary();
            $table->string('TYP_LIBELLE', 25);
            $table->string('TYP_LIEU', 35);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_praticien');
    }
};
