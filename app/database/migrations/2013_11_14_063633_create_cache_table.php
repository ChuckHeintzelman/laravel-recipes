<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCacheTable extends Migration {

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cache', function(Blueprint $table)
        {
            $table->string('key')->unique();
            $table->mediumtext('value');
            $table->integer('expiration');
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cache');
    }

}