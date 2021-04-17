<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = [
        'tth_wortliste',
        'tth_sprachen',
        'tth_sprachstile',
        'tth_regionen'
    ];

    /**
     * Seed the application's database.
     * 
     * I wonder why order in call array is preserved...
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // foreach($this->toTruncate as $table) {
        //     DB::table($table)->truncate();
        // }

        $this->call([
            TLanguageSeeder::class,
            TLanguageStyleSeeder::class,
            TRegionSeeder::class,
            TEntitySeeder::class,
            ]);
            
        Model::reguard();
    }
}
