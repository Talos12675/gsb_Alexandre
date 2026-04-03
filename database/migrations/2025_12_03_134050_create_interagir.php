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
        Schema::create('interagir', function (Blueprint $table) {
            $table->string('MED_PERTURBATEUR', 10);
            $table->string('MED_MED_PERTURBE', 10);
            $table->primary(['MED_PERTURBATEUR', 'MED_MED_PERTURBE']);
            $table->foreign('MED_PERTURBATEUR')->references('MED_DEPOTLEGAL')->on('medicament');
            $table->foreign('MED_MED_PERTURBE')->references('MED_DEPOTLEGAL')->on('medicament');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interagir');
    }
};
