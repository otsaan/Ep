<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('attachment', function(Blueprint $table)
		{
			$table->foreign('comment_id', 'fk_attachment_comment1')->references('id_comment')->on('comment')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('post_id', 'fk_attachment_post1')->references('post_id')->on('post')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('task_id', 'fk_attachment_task1')->references('task_id')->on('task')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('attachment', function(Blueprint $table)
		{
			$table->dropForeign('fk_attachment_comment1');
			$table->dropForeign('fk_attachment_post1');
			$table->dropForeign('fk_attachment_task1');
		});
	}

}
