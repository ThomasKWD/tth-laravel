<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Defines the main entity table
     * 
     * ! language not nullable means always required
     * 
     * !!! in which case does `$table->id();` suffice
     * 
      * @return void
     */
    public function up()
    {
        Schema::create('tth_wortliste', function (Blueprint $table) {
            $table->increments('id');
            $table->string('begriff')->index();
            $table->text('definition');
            $table->string('code'); // can contain symbols, e.g. '.' or '_'
            $table->string('gnd'); // is numeric but may contain spaces and hyphens
            
            $table->unsignedBigInteger('sprache_id');
            // no constraints so far!
            $table->foreign('sprache_id')->references('id')->on('tth_sprachen');
            
            // $table->integer('country_id')->nullable()->unsigned();
            $table->unsignedBigInteger('sprachstil_id')->nullable();
            // no constraints so far!
            $table->foreign('sprachstil_id')->references('id')->on('tth_sprachstile');

            $table->unsignedBigInteger('region_id')->nullable();
            // no constraints so far!
            $table->foreign('region_id')->references('id')->on('tth_regionen');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tth_wortliste');
    }
}
