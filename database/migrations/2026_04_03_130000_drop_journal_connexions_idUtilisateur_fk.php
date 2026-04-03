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
        Schema::table('journal_connexions', function (Blueprint $table) {
            if (Schema::hasColumn('journal_connexions', 'idUtilisateur')) {
                $table->dropForeign(['idUtilisateur']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('journal_connexions', function (Blueprint $table) {
            $table->foreign('idUtilisateur')->references('VIS_MATRICULE')->on('visiteur')->onDelete('cascade');
        });
    }
};
