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
        Schema::create('constituer', function (Blueprint $table) {
            $table->string('MED_DEPOTLEGAL', 10);
            $table->string('CMP_CODE', 4);
            $table->float('CST_QTE');
            $table->primary(['MED_DEPOTLEGAL', 'CMP_CODE']);
            $table->foreign('CMP_CODE')->references('CMP_CODE')->on('composant');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constituer');
    }
};
