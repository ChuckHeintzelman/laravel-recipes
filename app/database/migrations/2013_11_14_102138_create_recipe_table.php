<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->unique();
            $table->integer('category_id')->unsigned()->index();
            $table->text('problem');
            $table->text('solution');
            $table->text('discussion');
            $table->integer('position');
            $table->integer('views');
            $table->timestamps();
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
        Schema::drop('recipes');
    }

}
