<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePraticienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_praticien')->insert([
            ['TYP_CODE' => 'MH', 'TYP_LIBELLE' => 'Médecin Hospitalier', 'TYP_LIEU' => 'Hopital ou clinique'],
            ['TYP_CODE' => 'MV', 'TYP_LIBELLE' => 'Médecine de Ville', 'TYP_LIEU' => 'Cabinet'],
            ['TYP_CODE' => 'PH', 'TYP_LIBELLE' => 'Pharmacien Hospitalier', 'TYP_LIEU' => 'Hopital ou clinique'],
            ['TYP_CODE' => 'PO', 'TYP_LIBELLE' => 'Pharmacien Officine', 'TYP_LIEU' => 'Pharmacie'],
            ['TYP_CODE' => 'PS', 'TYP_LIBELLE' => 'Personnel de santé', 'TYP_LIEU' => 'Centre paramédical'],
        ]);
    }
}
