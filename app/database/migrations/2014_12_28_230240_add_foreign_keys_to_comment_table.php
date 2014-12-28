<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comment', function(Blueprint $table)
		{
			$table->foreign('post_id', 'fk_comment_post1')->references('post_id')->on('post')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_comment_user1')->references('user_id')->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comment', function(Blueprint $table)
		{
			$table->dropForeign('fk_comment_post1');
			$table->dropForeign('fk_comment_user1');
		});
	}

}
