<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCourseProfessorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('course_professor', function(Blueprint $table)
		{
			$table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_professor', function(Blueprint $table)
		{
			$table->dropForeign('course_professor_professor_id_foreign');
			$table->dropForeign('course_professor_course_id_foreign');
		});
	}

}
