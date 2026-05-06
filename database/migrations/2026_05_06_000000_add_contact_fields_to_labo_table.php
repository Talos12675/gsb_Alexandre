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
        if (Schema::hasTable('labo')) {
            // Vérifie l'existence de la table avant d'ajouter des colonnes.
            Schema::table('labo', function (Blueprint $table) {
                // Ajoute les colonnes seulement si elles n'existent pas déjà.
                if (! Schema::hasColumn('labo', 'LAB_EMAIL')) {
                    $table->string('LAB_EMAIL', 100)->nullable()->after('LAB_CHEFVENTE');
                }
                if (! Schema::hasColumn('labo', 'LAB_ADRESSE')) {
                    $table->string('LAB_ADRESSE', 255)->nullable()->after('LAB_EMAIL');
                }
                if (! Schema::hasColumn('labo', 'LAB_CP')) {
                    $table->string('LAB_CP', 10)->nullable()->after('LAB_ADRESSE');
                }
                if (! Schema::hasColumn('labo', 'LAB_VILLE')) {
                    $table->string('LAB_VILLE', 100)->nullable()->after('LAB_CP');
                }
                if (! Schema::hasColumn('labo', 'LAB_TELEPHONE')) {
                    $table->string('LAB_TELEPHONE', 25)->nullable()->after('LAB_VILLE');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('labo', function (Blueprint $table) {
            $table->dropColumn([
                'LAB_EMAIL',
                'LAB_ADRESSE',
                'LAB_CP',
                'LAB_VILLE',
                'LAB_TELEPHONE',
            ]);
        });
    }
};
