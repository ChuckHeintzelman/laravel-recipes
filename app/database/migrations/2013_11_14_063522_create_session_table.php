<?php

use Illuminate\Database\Migrations\Migration;

class CreateSessionTable extends Migration {

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sessions', function($t)
        {
            $t->string('id')->unique();
            $t->text('payload');
            $t->integer('last_activity');
            $t->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('sessions');
    }

}
