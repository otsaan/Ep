<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attachment', function(Blueprint $table)
		{
			$table->integer('attachment_id', true);
			$table->string('file_type');
			$table->string('link');
			$table->integer('comment_id')->nullable()->index('fk_attachment_comment1_idx');
			$table->integer('post_id')->nullable()->index('fk_attachment_post1_idx');
			$table->integer('task_id')->nullable()->index('fk_attachment_task1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attachment');
	}

}
