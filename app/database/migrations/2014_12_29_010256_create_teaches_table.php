<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teaches', function(Blueprint $table)
		{
			$table->integer('professor_id')->default(0)->index('fk_professor_has_course_professor1_idx');
			$table->integer('course_id')->index('fk_professor_has_course_course1_idx');
			$table->primary(['professor_id','course_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teaches');
	}

}
