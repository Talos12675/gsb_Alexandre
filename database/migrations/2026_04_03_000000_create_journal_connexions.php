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
        Schema::create('journal_connexions', function (Blueprint $table) {
            $table->id('idConnexion');
            $table->string('idUtilisateur', 10);
            $table->dateTime('dateConnexion')->useCurrent();
            $table->string('adresseIP', 45)->nullable();
            $table->string('userAgent', 255)->nullable();

            $table->foreign('idUtilisateur')->references('VIS_MATRICULE')->on('visiteur')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_connexions');
    }
};
