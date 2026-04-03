<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('famille')->insert([
            ['FAM_CODE' => 'AA', 'FAM_LIBELLE' => 'Antalgiques en association'],
            ['FAM_CODE' => 'AAA', 'FAM_LIBELLE' => 'Antalgiques antipyrétiques en association'],
            ['FAM_CODE' => 'AAC', 'FAM_LIBELLE' => 'Antidépresseur d\'action centrale'],
            ['FAM_CODE' => 'AAH', 'FAM_LIBELLE' => 'Antivertigineux antihistaminique H1'],
            ['FAM_CODE' => 'ABA', 'FAM_LIBELLE' => 'Antibiotique antituberculeux'],
            ['FAM_CODE' => 'ABC', 'FAM_LIBELLE' => 'Antibiotique antiacnéique local'],
            ['FAM_CODE' => 'ABP', 'FAM_LIBELLE' => 'Antibiotique de la famille des béta-lactamines (pénicilline A)'],
            ['FAM_CODE' => 'AFC', 'FAM_LIBELLE' => 'Antibiotique de la famille des cyclines'],
            ['FAM_CODE' => 'AFM', 'FAM_LIBELLE' => 'Antibiotique de la famille des macrolides'],
            ['FAM_CODE' => 'AH', 'FAM_LIBELLE' => 'Antihistaminique H1 local'],
            ['FAM_CODE' => 'AIM', 'FAM_LIBELLE' => 'Antidépresseur imipraminique (tricyclique)'],
            ['FAM_CODE' => 'AIN', 'FAM_LIBELLE' => 'Antidépresseur inhibiteur sélectif de la recapture de la sérotonine'],
            ['FAM_CODE' => 'ALO', 'FAM_LIBELLE' => 'Antibiotique local (ORL)'],
            ['FAM_CODE' => 'ANS', 'FAM_LIBELLE' => 'Antidépresseur IMAO non sélectif'],
            ['FAM_CODE' => 'AO', 'FAM_LIBELLE' => 'Antibiotique ophtalmique'],
            ['FAM_CODE' => 'AP', 'FAM_LIBELLE' => 'Antipsychotique normothymique'],
            ['FAM_CODE' => 'AUM', 'FAM_LIBELLE' => 'Antibiotique urinaire minute'],
            ['FAM_CODE' => 'CRT', 'FAM_LIBELLE' => 'Corticoïde, antibiotique et antifongique à  usage local'],
            ['FAM_CODE' => 'HYP', 'FAM_LIBELLE' => 'Hypnotique antihistaminique'],
            ['FAM_CODE' => 'PSA', 'FAM_LIBELLE' => 'Psychostimulant, antiasthénique'],
        ]);
    }
}
