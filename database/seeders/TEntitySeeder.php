<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TEntitySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('tth_wortliste')->insert([
            [
                'id' => 645,
                'begriff' => 'Abbund',
                'definition' => 'Dies ist ein wichtiger Vorgang.',
                'code' => '',
                'gnd' => '',
                'sprache_id' => 1,
                'sprachstil_id' => 2,
                'region_id' => NULL
            ]
        ]);
    }
}
