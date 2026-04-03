<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresenterSeeder extends Seeder
{
    public function run(): void
    {
        // La table de jointure (formuler ou presentation/dosage) n'a pas de données dans le fichier gsb.sql fourni.
        DB::table('formuler')->insert([]);
    }
}
