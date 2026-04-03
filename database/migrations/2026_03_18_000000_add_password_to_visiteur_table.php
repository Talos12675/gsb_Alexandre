<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('visiteur', function (Blueprint $table) {
            // Keep consistent naming with existing columns
            $table->string('VIS_PASSWORD', 255)->nullable();
        });

        // Give all existing visiteurs the same default password (hashed)
        $defaultHash = Hash::make('password');
        DB::table('visiteur')->update(['VIS_PASSWORD' => $defaultHash]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visiteur', function (Blueprint $table) {
            $table->dropColumn('VIS_PASSWORD');
        });
    }
};
