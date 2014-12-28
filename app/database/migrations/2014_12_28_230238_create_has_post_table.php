<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHasPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('has_post', function(Blueprint $table)
		{
			$table->integer('user_id')->index('fk_user_has_post_user1_idx');
			$table->integer('post_id')->index('fk_user_has_post_post1_idx');
			$table->string('feed', 45);
			$table->dateTime('date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('has_post');
	}

}
