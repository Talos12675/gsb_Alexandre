<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('region')->insert([
            ['REG_CODE' => 'AL', 'SEC_CODE' => 'E', 'REG_NOM' => 'Alsace Lorraine'],
            ['REG_CODE' => 'AQ', 'SEC_CODE' => 'S', 'REG_NOM' => 'Aquitaine'],
            ['REG_CODE' => 'AU', 'SEC_CODE' => 'P', 'REG_NOM' => 'Auvergne'],
            ['REG_CODE' => 'BG', 'SEC_CODE' => 'O', 'REG_NOM' => 'Bretagne'],
            ['REG_CODE' => 'BN', 'SEC_CODE' => 'O', 'REG_NOM' => 'Basse Normandie'],
            ['REG_CODE' => 'BO', 'SEC_CODE' => 'E', 'REG_NOM' => 'Bourgogne'],
            ['REG_CODE' => 'CA', 'SEC_CODE' => 'N', 'REG_NOM' => 'Champagne Ardennes'],
            ['REG_CODE' => 'CE', 'SEC_CODE' => 'P', 'REG_NOM' => 'Centre'],
            ['REG_CODE' => 'FC', 'SEC_CODE' => 'E', 'REG_NOM' => 'Franche Comté'],
            ['REG_CODE' => 'HN', 'SEC_CODE' => 'N', 'REG_NOM' => 'Haute Normandie'],
            ['REG_CODE' => 'IF', 'SEC_CODE' => 'P', 'REG_NOM' => 'Ile de France'],
            ['REG_CODE' => 'LG', 'SEC_CODE' => 'S', 'REG_NOM' => 'Languedoc'],
            ['REG_CODE' => 'LI', 'SEC_CODE' => 'P', 'REG_NOM' => 'Limousin'],
            ['REG_CODE' => 'MP', 'SEC_CODE' => 'S', 'REG_NOM' => 'Midi Pyrénée'],
            ['REG_CODE' => 'NP', 'SEC_CODE' => 'N', 'REG_NOM' => 'Nord Pas de Calais'],
            ['REG_CODE' => 'PA', 'SEC_CODE' => 'S', 'REG_NOM' => 'Provence Alpes Cote d\'Azur'],
            ['REG_CODE' => 'PC', 'SEC_CODE' => 'O', 'REG_NOM' => 'Poitou Charente'],
            ['REG_CODE' => 'PI', 'SEC_CODE' => 'N', 'REG_NOM' => 'Picardie'],
            ['REG_CODE' => 'PL', 'SEC_CODE' => 'O', 'REG_NOM' => 'Pays de Loire'],
            ['REG_CODE' => 'RA', 'SEC_CODE' => 'E', 'REG_NOM' => 'Rhone Alpes'],
            ['REG_CODE' => 'RO', 'SEC_CODE' => 'S', 'REG_NOM' => 'Roussilon'],
            ['REG_CODE' => 'VD', 'SEC_CODE' => 'O', 'REG_NOM' => 'Vendée'],
        ]);
    }
}
