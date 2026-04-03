<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteurSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('secteur')->insert([
            ['SEC_CODE' => 'E', 'SEC_LIBELLE' => 'Est'],
            ['SEC_CODE' => 'N', 'SEC_LIBELLE' => 'Nord'],
            ['SEC_CODE' => 'O', 'SEC_LIBELLE' => 'Ouest'],
            ['SEC_CODE' => 'P', 'SEC_LIBELLE' => 'Paris centre'],
            ['SEC_CODE' => 'S', 'SEC_LIBELLE' => 'Sud'],
        ]);
    }
}
