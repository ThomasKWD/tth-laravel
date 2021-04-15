<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * increments field is not important, the ids are fix anyway for existing languages
     * Index in sprache name is not important but good for demo.
     * 
     * Timestamps actually not needed, when we have history tables.
     * @return void
     */
    public function up()
    {
        Schema::create('tth_sprachen', function (Blueprint $table) {
            $table->id();
            $table->string('sprache')->index();
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
        Schema::dropIfExists('tth_sprachen');
    }
}
