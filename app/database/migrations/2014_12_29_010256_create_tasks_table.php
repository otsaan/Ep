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
			$table->integer('task_id', true);
			$table->text('description', 65535)->nullable();
			$table->integer('professor_id')->index('fk_task_professor1_idx');
			$table->dateTime('created_at')->default('CURRENT_TIMESTAMP(6)');
			$table->string('due_date', 45)->nullable();
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
