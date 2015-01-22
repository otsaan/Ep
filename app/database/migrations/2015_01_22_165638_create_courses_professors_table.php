<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesProfessorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_professors', function(Blueprint $table)
		{
			$table->integer('course_id', true);
			$table->integer('professor_id')->index('FK_courses_professors_professor_id');
			$table->primary(['course_id','professor_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses_professors');
	}

}
