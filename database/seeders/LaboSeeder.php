<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboSeeder extends Seeder
{
    public function run(): void
    {
        // Insertions des laboratoires avec données administratives complètes.
        DB::table('labo')->insert([
            [
                'LAB_CODE' => 'BC',
                'LAB_NOM' => 'Bichat',
                'LAB_CHEFVENTE' => 'Suzanne Terminus',
                'LAB_EMAIL' => 'contact@bichat.fr',
                'LAB_ADRESSE' => '12 rue des Sciences, 75015 Paris',
                'LAB_CP' => '75015',
                'LAB_VILLE' => 'Paris',
                'LAB_TELEPHONE' => '01 45 67 89 00',
            ],
            [
                'LAB_CODE' => 'GY',
                'LAB_NOM' => 'Gyverny',
                'LAB_CHEFVENTE' => 'Marcel MacDouglas',
                'LAB_EMAIL' => 'contact@gyverny.fr',
                'LAB_ADRESSE' => '7 avenue du Lac, 69002 Lyon',
                'LAB_CP' => '69002',
                'LAB_VILLE' => 'Lyon',
                'LAB_TELEPHONE' => '04 78 12 34 56',
            ],
            [
                'LAB_CODE' => 'SW',
                'LAB_NOM' => 'Swiss Kane',
                'LAB_CHEFVENTE' => 'Pierre Poutre',
                'LAB_EMAIL' => 'contact@swisskane.ch',
                'LAB_ADRESSE' => '18 chemin du Lac, 1205 Genève',
                'LAB_CP' => '1205',
                'LAB_VILLE' => 'Genève',
                'LAB_TELEPHONE' => '+41 22 345 67 89',
            ],
        ]);
    }
}
