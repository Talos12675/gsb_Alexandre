<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PossederSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'posseder' est vide dans le fichier gsb.sql fourni.
        DB::table('posseder')->insert([]);
    }
}
