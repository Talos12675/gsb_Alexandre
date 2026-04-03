<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstituerSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'constituer' est vide dans le fichier gsb.sql fourni.
        DB::table('constituer')->insert([]);
    }
}
