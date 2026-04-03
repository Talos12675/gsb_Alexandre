<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosageSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'dosage' est vide dans le fichier gsb.sql fourni.
        DB::table('dosage')->insert([]);
    }
}
