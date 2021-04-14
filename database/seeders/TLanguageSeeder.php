<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            // !!! check if special primarykey type needed
            ['id' => 1, 'sprache' => 'Deutsch'],
            // unusal order by purpose
            ['id' => 8, 'sprache' => 'Tschechisch'], 
            ['id' => 3, 'sprache' => 'Französisch'],
            ['id' => 4, 'sprache' => 'Niederländisch'],
            ['id' => 5, 'sprache' => 'Dänisch'],
            ['id' => 6, 'sprache' => 'Sorbisch'],
            ['id' => 7, 'sprache' => 'Polnisch'],
            // unusal order by purpose
            ['id' => 2, 'sprache' => 'Englisch'],
        ]);
    }
}
