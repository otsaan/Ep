<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tasks', function(Blueprint $table)
		{
			$table->foreign('channel_id', 'FK_tasks_channel_id')->references('id')->on('channels')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('professor_id', 'FK_tasks_professors_professor_id')->references('id')->on('professors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tasks', function(Blueprint $table)
		{
			$table->dropForeign('FK_tasks_channel_id');
			$table->dropForeign('FK_tasks_professors_professor_id');
		});
	}

}
