<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->integer('post_id')->primary();
			$table->integer('user_id')->nullable()->index('fk_posts_users1_idx');
			$table->text('content', 65535)->nullable();
			$table->integer('course_id')->nullable()->index('fk_post_course1_idx');
			$table->dateTime('created_at')->default('CURRENT_TIMESTAMP(6)');
			$table->string('feed', 45)->nullable();
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
