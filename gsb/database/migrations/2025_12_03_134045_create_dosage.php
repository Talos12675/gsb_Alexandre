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
        Schema::create('dosage', function (Blueprint $table) {
            $table->string('DOS_CODE', 10)->primary();
            $table->string('DOS_QUANTITE', 10);
            $table->string('DOS_UNITE', 10);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosage');
    }
};
