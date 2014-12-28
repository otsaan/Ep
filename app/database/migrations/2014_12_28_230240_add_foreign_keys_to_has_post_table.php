<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHasPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('has_post', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_user_has_post_user1')->references('user_id')->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('post_id', 'fk_user_has_post_post1')->references('post_id')->on('post')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('has_post', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_has_post_user1');
			$table->dropForeign('fk_user_has_post_post1');
		});
	}

}
