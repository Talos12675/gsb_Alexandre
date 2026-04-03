<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealiserSeeder extends Seeder
{
    public function run(): void
    {
        // La table 'realiser' est vide dans le fichier gsb.sql fourni.
        DB::table('realiser')->insert([]);
    }
}
