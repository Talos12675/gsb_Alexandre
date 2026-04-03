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
        if (Schema::hasTable('rapport_visite')) {
            Schema::table('rapport_visite', function (Blueprint $table) {
                if (! Schema::hasColumn('rapport_visite', 'created_at')) {
                    $table->timestamp('created_at')->nullable()->after('RAP_MOTIF');
                }
                if (! Schema::hasColumn('rapport_visite', 'updated_at')) {
                    $table->timestamp('updated_at')->nullable()->after('created_at');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('rapport_visite')) {
            Schema::table('rapport_visite', function (Blueprint $table) {
                if (Schema::hasColumn('rapport_visite', 'created_at')) {
                    $table->dropColumn('created_at');
                }
                if (Schema::hasColumn('rapport_visite', 'updated_at')) {
                    $table->dropColumn('updated_at');
                }
            });
        }
    }
};
