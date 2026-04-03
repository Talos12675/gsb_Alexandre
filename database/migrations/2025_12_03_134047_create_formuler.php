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
        Schema::create('formuler', function (Blueprint $table) {
            $table->string('MED_DEPOTLEGAL', 10);
            $table->string('PRE_CODE', 2);
            $table->primary(['MED_DEPOTLEGAL', 'PRE_CODE']);
            $table->foreign('MED_DEPOTLEGAL')->references('MED_DEPOTLEGAL')->on('medicament');
            $table->foreign('PRE_CODE')->references('PRE_CODE')->on('presentation');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formuler');
    }
};
