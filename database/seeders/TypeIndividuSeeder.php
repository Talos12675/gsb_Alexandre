<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeIndividuSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'type_individu' est vide dans le fichier gsb.sql fourni.
        DB::table('type_individu')->insert([]);
    }
}
