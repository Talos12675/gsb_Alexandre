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
        // Création de la table des collaborateurs de laboratoire.
        Schema::create('collaborateur', function (Blueprint $table) {
            $table->id();
            $table->string('LAB_CODE', 2);
            $table->string('COL_NOM', 50);
            $table->string('COL_PRENOM', 50);
            $table->string('COL_EMAIL', 100);
            $table->string('COL_TELEPHONE', 25)->nullable();
            $table->string('COL_POSTE', 100);

            // Clé étrangère vers la table labo pour relier le collaborateur à son laboratoire.
            $table->foreign('LAB_CODE')
                ->references('LAB_CODE')
                ->on('labo')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborateur');
    }
};
