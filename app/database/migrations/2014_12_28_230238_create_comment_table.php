<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment', function(Blueprint $table)
		{
			$table->integer('id_comment', true);
			$table->text('content', 65535)->nullable();
			$table->integer('post_id')->index('fk_comment_post1_idx');
			$table->integer('user_id')->nullable()->index('fk_comment_user1_idx');
			$table->string('created_at', 45);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comment');
	}

}
