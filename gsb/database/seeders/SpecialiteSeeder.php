<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialiteSeeder extends Seeder
{
    public function run(): void
    {
        // Contient 40 enregistrements
        DB::table('specialite')->insert([
            ['SPE_CODE' => 'ACP', 'SPE_LIBELLE' => 'anatomie et cytologie pathologiques'],
            ['SPE_CODE' => 'AMV', 'SPE_LIBELLE' => 'angéiologie, médecine vasculaire'],
            ['SPE_CODE' => 'ARC', 'SPE_LIBELLE' => 'anesthésiologie et réanimation chirurgicale'],
            ['SPE_CODE' => 'BM', 'SPE_LIBELLE' => 'biologie médicale'],
            ['SPE_CODE' => 'CAC', 'SPE_LIBELLE' => 'cardiologie et affections cardio-vasculaires'],
            ['SPE_CODE' => 'CCT', 'SPE_LIBELLE' => 'chirurgie cardio-vasculaire et thoracique'],
            ['SPE_CODE' => 'CG', 'SPE_LIBELLE' => 'chirurgie générale'],
            ['SPE_CODE' => 'CMF', 'SPE_LIBELLE' => 'chirurgie maxillo-faciale'],
            ['SPE_CODE' => 'COM', 'SPE_LIBELLE' => 'cancérologie, oncologie médicale'],
            ['SPE_CODE' => 'COT', 'SPE_LIBELLE' => 'chirurgie orthopédique et traumatologie'],
            ['SPE_CODE' => 'CPR', 'SPE_LIBELLE' => 'chirurgie plastique reconstructrice et esthétique'],
            ['SPE_CODE' => 'CU', 'SPE_LIBELLE' => 'chirurgie urologique'],
            ['SPE_CODE' => 'CV', 'SPE_LIBELLE' => 'chirurgie vasculaire'],
            ['SPE_CODE' => 'DN', 'SPE_LIBELLE' => 'diabétologie-nutrition, nutrition'],
            ['SPE_CODE' => 'DV', 'SPE_LIBELLE' => 'dermatologie et vénéréologie'],
            ['SPE_CODE' => 'EM', 'SPE_LIBELLE' => 'endocrinologie et métabolismes'],
            ['SPE_CODE' => 'ETD', 'SPE_LIBELLE' => 'évaluation et traitement de la douleur'],
            ['SPE_CODE' => 'GEH', 'SPE_LIBELLE' => 'gastro-entérologie et hépatologie (appareil digestif)'],
            ['SPE_CODE' => 'GMO', 'SPE_LIBELLE' => 'gynécologie médicale, obstétrique'],
            ['SPE_CODE' => 'GO', 'SPE_LIBELLE' => 'gynécologie-obstétrique'],
            ['SPE_CODE' => 'HEM', 'SPE_LIBELLE' => 'maladies du sang (hématologie)'],
            ['SPE_CODE' => 'MBS', 'SPE_LIBELLE' => 'médecine et biologie du sport'],
            ['SPE_CODE' => 'MDT', 'SPE_LIBELLE' => 'médecine du travail'],
            ['SPE_CODE' => 'MMO', 'SPE_LIBELLE' => 'médecine manuelle - ostéopathie'],
            ['SPE_CODE' => 'MN', 'SPE_LIBELLE' => 'médecine nucléaire'],
            ['SPE_CODE' => 'MPR', 'SPE_LIBELLE' => 'médecine physique et de réadaptation'],
            ['SPE_CODE' => 'MTR', 'SPE_LIBELLE' => 'médecine tropicale, pathologie infectieuse et tropicale'],
            ['SPE_CODE' => 'NEP', 'SPE_LIBELLE' => 'néphrologie'],
            ['SPE_CODE' => 'NRC', 'SPE_LIBELLE' => 'neurochirurgie'],
            ['SPE_CODE' => 'NRL', 'SPE_LIBELLE' => 'neurologie'],
            ['SPE_CODE' => 'ODM', 'SPE_LIBELLE' => 'orthopédie dento maxillo-faciale'],
            ['SPE_CODE' => 'OPH', 'SPE_LIBELLE' => 'ophtalmologie'],
            ['SPE_CODE' => 'ORL', 'SPE_LIBELLE' => 'oto-rhino-laryngologie'],
            ['SPE_CODE' => 'PEA', 'SPE_LIBELLE' => 'psychiatrie de l\'enfant et de l\'adolescent'],
            ['SPE_CODE' => 'PME', 'SPE_LIBELLE' => 'pédiatrie maladies des enfants'],
            ['SPE_CODE' => 'PNM', 'SPE_LIBELLE' => 'pneumologie'],
            ['SPE_CODE' => 'PSC', 'SPE_LIBELLE' => 'psychiatrie'],
            ['SPE_CODE' => 'RAD', 'SPE_LIBELLE' => 'radiologie (radiodiagnostic et imagerie médicale)'],
            ['SPE_CODE' => 'RDT', 'SPE_LIBELLE' => 'radiothérapie (oncologie option radiothérapie)'],
            ['SPE_CODE' => 'RGM', 'SPE_LIBELLE' => 'reproduction et gynécologie médicale'],
            ['SPE_CODE' => 'RHU', 'SPE_LIBELLE' => 'rhumatologie'],
            ['SPE_CODE' => 'STO', 'SPE_LIBELLE' => 'stomatologie'],
            ['SPE_CODE' => 'SXL', 'SPE_LIBELLE' => 'sexologie'],
            ['SPE_CODE' => 'TXA', 'SPE_LIBELLE' => 'toxicomanie et alcoologie'],
        ]);
    }
}
