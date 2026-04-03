<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mettre à jour les created_at et updated_at avec RAP_DATE pour les anciens enregistrements
        DB::table('rapport_visite')
            ->whereNull('created_at')
            ->update([
                'created_at' => DB::raw('RAP_DATE'),
                'updated_at' => DB::raw('RAP_DATE'),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Aucune action de rollback nécessaire
    }
};
