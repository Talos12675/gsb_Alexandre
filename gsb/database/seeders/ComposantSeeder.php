<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComposantSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'composant' est vide dans le fichier gsb.sql fourni.
        DB::table('composant')->insert([]);
    }
}
