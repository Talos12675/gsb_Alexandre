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
        Schema::create('inviter', function (Blueprint $table) {
            $table->unsignedInteger('AC_NUM');
            $table->unsignedSmallInteger('PRA_NUM');
            $table->boolean('SPECIALISTEON')->nullable();
            $table->primary(['AC_NUM', 'PRA_NUM']);
            $table->foreign('AC_NUM')->references('AC_NUM')->on('activite_compl');
            $table->foreign('PRA_NUM')->references('PRA_NUM')->on('praticien');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inviter');
    }
};
