<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeRecipePivot extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_recipe', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('code_id')->unsigned();
            $table->integer('recipe_id')->unsigned();
            $table->unique(['code_id', 'recipe_id']);
            $table->unique(['recipe_id', 'code_id']);
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
        Schema::drop('code_recipe');
    }

}
