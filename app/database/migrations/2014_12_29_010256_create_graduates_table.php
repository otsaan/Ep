<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGraduatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('graduates', function(Blueprint $table)
		{
			$table->integer('graduate_id')->index('fk_graduated_user1_idx');
			$table->integer('class_id')->index('fk_graduate_class1_idx');
			$table->dateTime('graduation_year');
			$table->string('current_job', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('graduates');
	}

}
