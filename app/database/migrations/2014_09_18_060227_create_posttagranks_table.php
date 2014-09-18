<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosttagranksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posttagranks', function($table)
	    {
	        $table->increments('id');
	        $table->integer('post_id')->unsigned();
	        $table->integer('tag_id')->unsigned();
	        $table->integer('rank');
	        $table->timestamps();
	        
	        $table->foreign('post_id')->references('id')->on('posts');
	        $table->foreign('tag_id')->references('id')->on('tags');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posttagranks');
	}

}
