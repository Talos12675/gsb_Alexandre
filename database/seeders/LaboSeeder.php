<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('labo')->insert([
            ['LAB_CODE' => 'BC', 'LAB_NOM' => 'Bichat', 'LAB_CHEFVENTE' => 'Suzanne Terminus'],
            ['LAB_CODE' => 'GY', 'LAB_NOM' => 'Gyverny', 'LAB_CHEFVENTE' => 'Marcel MacDouglas'],
            ['LAB_CODE' => 'SW', 'LAB_NOM' => 'Swiss Kane', 'LAB_CHEFVENTE' => 'Alain Poutre'],
        ]);
    }
}
