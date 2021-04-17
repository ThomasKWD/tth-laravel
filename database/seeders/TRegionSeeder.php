<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TRegionSeeder extends Seeder
{
    /**
     * id is primary key but must be set because meaning of relations
     *  brake otherwise
     * !!! could be defined unique key
     * 
     * seeds the "real world" content, because these are  just  6 entries
     * 
     * @return void
     */
    public function run()
    {
        DB::table('tth_regionen')->insert([
            ['id' => 1, 'region' => 'Norddeutsch'],
            ['id' => 2, 'region' => 'Süddeutsch'],
            ['id' => 3, 'region' => 'Österreich'],
        ]);
    }
}
