<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RapportVisiteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rapport_visite')->insert([
            ['VIS_MATRICULE' => 'a131', 'RAP_NUM' => 3, 'PRA_NUM' => 23, 'RAP_DATE' => '2002-04-18 00:00:00', 'RAP_BILAN' => 'Médecin curieux, à recontacter en décembre pour réunion', 'RAP_MOTIF' => 'Actualisation annuelle'],
            ['VIS_MATRICULE' => 'a131', 'RAP_NUM' => 7, 'PRA_NUM' => 41, 'RAP_DATE' => '2003-03-23 00:00:00', 'RAP_BILAN' => 'RAS\r\nChangement de tel : 05 89 89 89 89', 'RAP_MOTIF' => 'Rapport Annuel'],
            ['VIS_MATRICULE' => 'a17', 'RAP_NUM' => 4, 'PRA_NUM' => 4, 'RAP_DATE' => '2003-05-21 00:00:00', 'RAP_BILAN' => 'Changement de direction, redéfinition de la politique médicamenteuse, recours au générique', 'RAP_MOTIF' => 'Baisse activité'],
            ['VIS_MATRICULE' => 'zzz', 'RAP_NUM' => 9, 'PRA_NUM' => 84, 'RAP_DATE' => '2017-03-07 00:00:00', 'RAP_BILAN' => 'test', 'RAP_MOTIF' => 'thu'],
            ['VIS_MATRICULE' => 'zzz', 'RAP_NUM' => 10, 'PRA_NUM' => 12, 'RAP_DATE' => '2017-03-07 00:00:00', 'RAP_BILAN' => 'gtfhfg', 'RAP_MOTIF' => 'regdf'],
            ['VIS_MATRICULE' => 'zzz', 'RAP_NUM' => 12, 'PRA_NUM' => 82, 'RAP_DATE' => '2017-03-04 00:00:00', 'RAP_BILAN' => 'hvjujfthgbdf', 'RAP_MOTIF' => 'zeatgr'],
            ['VIS_MATRICULE' => 'zzz', 'RAP_NUM' => 13, 'PRA_NUM' => 41, 'RAP_DATE' => '2017-03-07 00:00:00', 'RAP_BILAN' => 'popopoopo', 'RAP_MOTIF' => 'jean pierre lulu'],
            ['VIS_MATRICULE' => 'zzz', 'RAP_NUM' => 14, 'PRA_NUM' => 81, 'RAP_DATE' => '2017-03-07 00:00:00', 'RAP_BILAN' => 'dodood', 'RAP_MOTIF' => 'malle a dos'],
            ['VIS_MATRICULE' => 'zzz', 'RAP_NUM' => 15, 'PRA_NUM' => 84, 'RAP_DATE' => '2017-03-07 00:00:00', 'RAP_BILAN' => 'bilan', 'RAP_MOTIF' => 'mal a la gorge'],
            ['VIS_MATRICULE' => 'zzz', 'RAP_NUM' => 16, 'PRA_NUM' => 12, 'RAP_DATE' => '2017-03-21 00:00:00', 'RAP_BILAN' => 'fsdgd', 'RAP_MOTIF' => 'pour'],
            ['VIS_MATRICULE' => 'a131', 'RAP_NUM' => 27, 'PRA_NUM' => 73, 'RAP_DATE' => '2020-12-01 15:12:00', 'RAP_BILAN' => 'Angor d’effort suspecté, coronographie prévue', 'RAP_MOTIF' => 'Consultation en cardiologie'],
            ['VIS_MATRICULE' => 'a131', 'RAP_NUM' => 26, 'PRA_NUM' => 59, 'RAP_DATE' => '2025-05-09 14:13:00', 'RAP_BILAN' => 'Virose ORL bénigne, traitement symptomatique', 'RAP_MOTIF' => 'Consultation de médecine générale'],
        ]);
    }
}
