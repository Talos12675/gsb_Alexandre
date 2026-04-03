<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('rapport_visite')) {
            // Mettre à jour les created_at et updated_at avec RAP_DATE pour les anciens enregistrements
            DB::table('rapport_visite')
                ->whereNull('created_at')
                ->update([
                    'created_at' => DB::raw('RAP_DATE'),
                    'updated_at' => DB::raw('RAP_DATE'),
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Aucune action de rollback nécessaire
    }
};
