<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TLanguageSeeder extends Seeder
{
    /**
     * id is primary key but must be set because meaning of relations
     *  brake otherwise
     * 
     * seeds the "real world" content, because these are  just some entries
     * 
     * @return void
     */
    public function run()
    {
        DB::table('tth_sprachen')->insert([
            ['id' => 1, 'stil' => 'Allgemein'],
            ['id' => 2, 'stil' => 'Wissenschaftlich'],
            ['id' => 3, 'stil' => 'Umgangssprachlich'],
            ['id' => 4, 'stil' => 'Fachsprachlich'],
            ['id' => 5, 'stil' => 'Regional']
        ]);
    }
}
