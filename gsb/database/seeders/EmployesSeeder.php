<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employes')->insert([
            [
                'matricule' => 'EMP001',
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'adresse' => '123 rue de Paris',
                'code_postal' => '75001',
                'ville' => 'Paris',
                'date_embauche' => '2020-01-15',
            ],
            [
                'matricule' => 'EMP002',
                'nom' => 'Martin',
                'prenom' => 'Marie',
                'adresse' => '456 avenue des Champs',
                'code_postal' => '75008',
                'ville' => 'Paris',
                'date_embauche' => '2019-03-20',
            ],
            [
                'matricule' => 'EMP003',
                'nom' => 'Bernard',
                'prenom' => 'Pierre',
                'adresse' => '789 boulevard Victor Hugo',
                'code_postal' => '69001',
                'ville' => 'Lyon',
                'date_embauche' => '2021-06-10',
            ],
        ]);
    }
}
