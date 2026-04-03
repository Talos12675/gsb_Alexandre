<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponsableSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'responsable' n'existe pas dans le schéma SQL fourni.
        // Les rôles sont gérés dans la table 'travailler'.
        // Si cette classe était destinée à une table distincte, elle serait vide.
        DB::table('responsable')->insert([]);
    }
}
