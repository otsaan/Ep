<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('description', 65535)->nullable();
			$table->timestamps();
			$table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
			$table->dateTime('due_date')->nullable();
			$table->integer('professor_id')->index('FK_tasks_professors_professor_id');
			$table->integer('channel_id')->index('FK_tasks_channel_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
