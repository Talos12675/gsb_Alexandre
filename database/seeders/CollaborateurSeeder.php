<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollaborateurSeeder extends Seeder
{
    public function run(): void
    {
        // Insertion des collaborateurs par laboratoire pour la fiche Laboratoires.
        DB::table('collaborateur')->insert([
            [
                'LAB_CODE' => 'BC',
                'COL_NOM' => 'Dupont',
                'COL_PRENOM' => 'Claire',
                'COL_EMAIL' => 'claire.dupont@bichat.fr',
                'COL_TELEPHONE' => '01 45 67 89 10',
                'COL_POSTE' => 'Directeur des ventes',
            ],
            [
                'LAB_CODE' => 'BC',
                'COL_NOM' => 'Martin',
                'COL_PRENOM' => 'Antoine',
                'COL_EMAIL' => 'antoine.martin@bichat.fr',
                'COL_TELEPHONE' => '01 45 67 89 11',
                'COL_POSTE' => 'Administratif',
            ],
            [
                'LAB_CODE' => 'BC',
                'COL_NOM' => 'Laurent',
                'COL_PRENOM' => 'Julien',
                'COL_EMAIL' => 'julien.laurent@bichat.fr',
                'COL_TELEPHONE' => '01 45 67 89 12',
                'COL_POSTE' => 'RSSI',
            ],
            [
                'LAB_CODE' => 'BC',
                'COL_NOM' => 'Moreau',
                'COL_PRENOM' => 'Sophie',
                'COL_EMAIL' => 'sophie.moreau@bichat.fr',
                'COL_TELEPHONE' => '01 45 67 89 13',
                'COL_POSTE' => 'CEO',
            ],
            [
                'LAB_CODE' => 'GY',
                'COL_NOM' => 'Girard',
                'COL_PRENOM' => 'Sophie',
                'COL_EMAIL' => 'sophie.girard@gyverny.fr',
                'COL_TELEPHONE' => '02 33 44 55 66',
                'COL_POSTE' => 'CEO',
            ],
            [
                'LAB_CODE' => 'GY',
                'COL_NOM' => 'Leroy',
                'COL_PRENOM' => 'Nicolas',
                'COL_EMAIL' => 'nicolas.leroy@gyverny.fr',
                'COL_TELEPHONE' => '02 33 44 55 67',
                'COL_POSTE' => 'RSSI',
            ],
            [
                'LAB_CODE' => 'GY',
                'COL_NOM' => 'Dupuis',
                'COL_PRENOM' => 'Isabelle',
                'COL_EMAIL' => 'isabelle.dupuis@gyverny.fr',
                'COL_TELEPHONE' => '02 33 44 55 68',
                'COL_POSTE' => 'Administratif',
            ],
            [
                'LAB_CODE' => 'GY',
                'COL_NOM' => 'Bernard',
                'COL_PRENOM' => 'Paul',
                'COL_EMAIL' => 'paul.bernard@gyverny.fr',
                'COL_TELEPHONE' => '02 33 44 55 69',
                'COL_POSTE' => 'Directeur des ventes',
            ],
            [
                'LAB_CODE' => 'SW',
                'COL_NOM' => 'Bernard',
                'COL_PRENOM' => 'Emma',
                'COL_EMAIL' => 'emma.bernard@swisskane.ch',
                'COL_TELEPHONE' => '04 56 78 90 12',
                'COL_POSTE' => 'Directeur des ventes',
            ],
            [
                'LAB_CODE' => 'SW',
                'COL_NOM' => 'Weber',
                'COL_PRENOM' => 'Pierre',
                'COL_EMAIL' => 'pierre.weber@swisskane.ch',
                'COL_TELEPHONE' => '04 56 78 90 13',
                'COL_POSTE' => 'CEO',
            ],
            [
                'LAB_CODE' => 'SW',
                'COL_NOM' => 'Muller',
                'COL_PRENOM' => 'Laura',
                'COL_EMAIL' => 'laura.muller@swisskane.ch',
                'COL_TELEPHONE' => '04 56 78 90 14',
                'COL_POSTE' => 'Administratif',
            ],
            [
                'LAB_CODE' => 'SW',
                'COL_NOM' => 'Meier',
                'COL_PRENOM' => 'Céline',
                'COL_EMAIL' => 'celine.meier@swisskane.ch',
                'COL_TELEPHONE' => '04 56 78 90 15',
                'COL_POSTE' => 'Responsable qualité',
            ],
        ]);
    }
}
