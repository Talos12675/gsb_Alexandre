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
        Schema::create('switchboard items', function (Blueprint $table) {
            $table->integer('SwitchboardID');
            $table->smallInteger('ItemNumber');
            $table->string('ItemText', 255)->nullable();
            $table->smallInteger('Command')->nullable();
            $table->string('Argument', 255)->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('switchboard_items');
    }
};
