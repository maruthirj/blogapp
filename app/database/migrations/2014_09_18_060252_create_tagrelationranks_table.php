<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagrelationranksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagrelationranks', function($table)
	    {
	        $table->increments('id');
	        $table->integer('tag_from_id')->unsigned();
	        $table->integer('tag_to_id')->unsigned();
	        $table->integer('rank');
	        $table->timestamps();
	        
	        $table->foreign('tag_from_id')->references('id')->on('tags');
	        $table->foreign('tag_to_id')->references('id')->on('tags');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tagrelationranks');
	}

}
