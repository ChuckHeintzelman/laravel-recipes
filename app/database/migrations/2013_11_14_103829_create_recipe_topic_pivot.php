<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTopicPivot extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_topic', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('recipe_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->unique(['recipe_id', 'topic_id']);
            $table->unique(['topic_id', 'recipe_id']);
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipe_topic');
    }

}
