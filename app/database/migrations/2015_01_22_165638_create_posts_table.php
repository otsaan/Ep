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
			$table->integer('id', true);
			$table->text('content', 65535)->nullable();
			$table->timestamps();
			$table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
			$table->integer('channel_id')->nullable()->index('FK_posts_channel_id');
			$table->integer('user_id')->nullable()->index('FK_posts_user_id');
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
