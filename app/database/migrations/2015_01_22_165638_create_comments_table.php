<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('content', 65535)->nullable();
			$table->timestamps();
			$table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
			$table->integer('user_id')->index('FK_comments_user_id');
			$table->integer('post_id')->index('FK_comments_post_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
