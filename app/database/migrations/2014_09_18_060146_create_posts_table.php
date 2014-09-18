<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table)
	    {
	        $table->increments('id');
	        $table->string('post_key')->unique();
	        $table->string('title');
	        $table->string('post_text');
	        $table->integer('user_id')->unsigned();
	        $table->timestamps();

	        $table->index('post_key');
	        $table->foreign('user_id')->references('id')->on('users');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
