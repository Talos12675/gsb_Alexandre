<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InteragirSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'interagir' est vide dans le fichier gsb.sql fourni.
        DB::table('interagir')->insert([]);
    }
}
