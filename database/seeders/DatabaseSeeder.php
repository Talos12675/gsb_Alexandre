<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Exécute les seeders de la base de données.
     *
     * @return void
     */
    public function run()
    {
        // Appelle tous les seeders dans l'ordre de dépendances (tables de base d'abord)
        $this->call([
            UserSeeder::class,
            ActiviteComplSeeder::class,
            ComposantSeeder::class,
            DosageSeeder::class,
            EmployesSeeder::class,
            FamilleSeeder::class,
            LaboSeeder::class,
            SecteurSeeder::class,
            RegionSeeder::class,
            SpecialiteSeeder::class,
            TypeIndividuSeeder::class,
            TypePraticienSeeder::class,
            PraticienSeeder::class,
            VisiteurSeeder::class,
            MedicamentSeeder::class,
            PresenterSeeder::class,
            ConstituerSeeder::class,
            PossederSeeder::class,
            RapportVisiteSeeder::class,
            RealiserSeeder::class,
            TravaillerSeeder::class,
            InteragirSeeder::class,
        ]);
    }
}
