<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesProfessorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_professors', function(Blueprint $table)
		{
			$table->foreign('professor_id', 'FK_courses_professors_professor_id')->references('id')->on('professors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('course_id', 'FK_courses_professors_course_id')->references('id')->on('courses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_professors', function(Blueprint $table)
		{
			$table->dropForeign('FK_courses_professors_professor_id');
			$table->dropForeign('FK_courses_professors_course_id');
		});
	}

}
